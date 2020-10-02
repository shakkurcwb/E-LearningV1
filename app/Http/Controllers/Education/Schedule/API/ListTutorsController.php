<?php

namespace App\Http\Controllers\Education\Schedule\API;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Account\UserModel;

class ListTutorsController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->middleware('verified');
        $this->middleware('student');
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $tutors = UserModel::where('state', 'Active')
            ->where('role', 'Tutor')
            ->get();

        $student = $this->request->user();

        // Matching Engine V2
        $match = new Matching($student);

        // Agenda Engine V2
        $agenda = new Agenda($student);

        // Mapping Tutors
        $users = $tutors->map(function ($tutor) use ($match, $agenda) {

            // Match
            $tutor['matching'] = $match->compare($tutor);

            // Agenda
            $tutor['agenda'] = $agenda->make($tutor);

            return $tutor;
        });

        $users = $users->filter(function ($tutor) {
            return $tutor['matching']['percent'] >= 50;
        });

        $users = array_values($users->toArray());

        return $this->json($users);
    }
}

// Matching Engine V2
class Matching
{
    protected $student;

    public function __construct($student)
    {
        $this->student = $student;
    }
    
    private function prepareAnswers($user)
    {
        // Get Answers
        $answers = $user
            ->admissions
            ->first()
            ->answers
            ->toArray();

        // Prepare Answers Tutor
        $public_answers = collect($answers)
            ->filter(function($answer) {
                return $answer['question']['is_matchable'];
            })
            ->map(function($answer) {
                return Arr::wrap($answer['answer']);
            })
            ->all();

        $private_answers = collect($answers)
            ->filter(function($answer) {
                return $answer['question']['is_matchable'] && $answer['question']['show_matches'];
            })
            ->map(function($answer) {
                return Arr::wrap($answer['answer']);
            })
            ->all();

        return [
            "public" => Arr::collapse($public_answers),
            "private" => Arr::collapse($private_answers),
        ];
    }

    private function calculate($matchable, $candidate)
    {
        $matching = [
            'matches' => 0,
            'total' => 0,
            'percent' => 0,
            'mutual' => [],
        ];

        $matching['total'] = count($matchable['public']);

        foreach($matchable['public'] as $answer)
        {
            $is_match = array_search($answer, $candidate['public'], true);

            if ($is_match)
            {
                $matching['matches'] += 1;
            }
        }

        foreach($matchable['private'] as $answer)
        {
            $is_match = array_search($answer, $candidate['private'], true);

            if ($is_match)
            {
                $matching['mutual'][] = Str::title($answer);
            }
        }

        $matching['percent'] = round(( $matching['matches'] / $matching['total'] ) * 100);

        return $matching;
    }

    public function compare($tutor)
    {
        $matchable = $this->prepareAnswers($this->student);
        $candidate = $this->prepareAnswers($tutor);
        return $this->calculate($matchable, $candidate);
    }
}

// Agenda Engine V2
class Agenda
{
    protected $student;

    private $frequency = "Single";
    private $duration = "01:00:00";

    const MAX_SUGESTIONS = 32;

    public function __construct($student)
    {
        $this->student = $student;
        $this->definePolicies();
    }

    private function definePolicies()
    {
        if ($this->student->activeSubscription)
        {
            $this->frequency = $this->student->activeSubscription->plan->features->frequency;
            $this->duration = $this->student->activeSubscription->plan->features->duration;
        }
    }

    public function make($tutor)
    {
        $agenda = [];

        $seed = now()->setTimezone($this->student->settings->timezone)->addHours(1);

        $agenda['trial'] = $this->generateSugestions($seed, 1);

        $agenda['premium'] = [
            $this->generateSugestions($seed),
            $this->generateSugestions($seed->addWeek(1)),
            $this->generateSugestions($seed->addWeek(2)),
            $this->generateSugestions($seed->addWeek(3)),
        ];

        return $agenda;
    }

    private function generateSugestions($seed, $duration = null)
    {
        if (empty($duration))
        {
            $duration = $this->duration();
        }

        $agenda = [];

        for ($i = 0; $i < self::MAX_SUGESTIONS; $i++)
        {
            // Set Start
            $start = $seed->copy();
            $start->addHours($i);

            // Set End
            $end = $start->copy();
            $end->addHours($duration);

            $agenda[$i] = [
                "label" => $start->format("l, F d"),
                "start" => $start->format("h:00 A"),
                "end" => $end->format("h:00 A"),
                "start_at" => $start->setMinutes(0)->setSeconds(0)->format("Y-m-d H:i:s"),
                "end_at" => $end->setMinutes(0)->setSeconds(0)->format("Y-m-d H:i:s"),
            ];
        }
        return $agenda;
    }

    private function duration()
    {
        if ($this->student->credits > 0)
        {
            switch($this->duration)
            {
                case "03:00:00": return 3;
                case "02:00:00": return 2;
                case "01:00:00": default: return 1;
            }
        }
        return 1;
    }

    private function frequency()
    {
        if ($this->student->credits > 0)
        {
            switch($this->frequency)
            {
                case "Thrice Per Week": return 3;
                case "Twice Per Week": return 2;
                case "Once Per Week": default: return 1;
            }
        }
        return 1;
    }
}