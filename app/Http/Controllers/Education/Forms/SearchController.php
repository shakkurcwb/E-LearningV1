<?php

namespace App\Http\Controllers\Education\Forms;

use Illuminate\Http\Request;

use App\Services\Education\Forms\SearchFormsService;

use App\Http\Controllers\ActionController;

class SearchController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');

        parent::__construct($request);
    }

    /**
     * Execute controller main action.
     * 
     */
    public function __invoke()
    {
        $query = $this->request->input('q');

        // Clear Search
        if (empty($query)) return $this->redirect('/forms');

        // Execute Service(s)
        $svc = new SearchFormsService;
        $svc->setAttributes([
            'query' => $query,
        ]);
        $forms = $svc->execute();

        return $this->view('education.forms.index', [
            'forms' => $forms,
        ]);
    }
}
