<?php

namespace App\Http\Controllers\Education\Forms;

use Illuminate\Http\Request;

use App\Services\Education\Forms\ListFormsService;

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
        $this->middleware('admin');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        // All Forms
        $svc = new ListFormsService;
        $forms = $svc->execute();

        return $this->view('education.forms.index', [
            'forms' => $forms,
        ]);
    }
}
