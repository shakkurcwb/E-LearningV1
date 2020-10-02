<?php

namespace App\Http\Controllers\Education\Schedule\API;

use Illuminate\Http\Request;

use App\Services\Education\Sessions\StoreSessionService;

use App\Http\Controllers\ActionController;

class ScheduleSessionsController extends ActionController
{
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

        parent::__construct($request);
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        // Preparing Validator
        $rules = [
            'sessions' => [ 'required', 'array' ],
            'sessions.*.tutor_id' => [ 'required', 'numeric', 'exists:users,id' ],
            'sessions.*.start_at' => [ 'required', 'date' ],
            'sessions.*.end_at' => [ 'required', 'date' ],
            'sessions.*.additional_info' => [ 'nullable', 'string' ],
        ];

        $messages = [
            'sessions.*.tutor_id' => __('education.attributes.session.tutor_id'),
            'sessions.*.start_at' => __('education.attributes.session.start_at'),
            'sessions.*.end_at' => __('education.attributes.session.end_at'),
            'sessions.*.additional_info' => __('education.attributes.session.additional_info'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);
        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Custom Attributes
        data_set($attributes, 'sessions.*.student_id', $this->request->user()->id);

        $sessions = [];

        $cost = 0;

        # Store Each Session
        foreach($attributes['sessions'] as $data)
        {
            $cost += $data['cost'];

            $data['start_at'] = \Carbon\Carbon::parse($data['start_at'], $this->request->user()->settings->timezone);
            $data['end_at'] = \Carbon\Carbon::parse($data['end_at'], $this->request->user()->settings->timezone);

            $svc = new StoreSessionService;
            $svc->setAttributes($data);
            $session = $svc->execute();
            $sessions[] = $session->toArray();
        }

        // Remove Credits
        $this->request->user()->decrement('credits', $cost);

        return $this->json($sessions);
    }
}