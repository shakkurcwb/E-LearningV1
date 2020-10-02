<?php

namespace App\Http\Controllers\Education\Lessons;

use Illuminate\Http\Request;

use App\Services\Education\Lessons\ListLessonsService;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $svc = new ListLessonsService;
        $lessons = $svc->execute();

        return $this->view('education.lessons.index', [
            'lessons' => $lessons,
        ]);
    }
}
