<?php

namespace App\Http\Controllers\Education\Admissions;

use Illuminate\Http\Request;

use App\Services\Education\Admissions\SearchAdmissionsService;

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
        if (empty($query)) return $this->redirect('/admissions');

        // Execute Service(s)
        $svc = new SearchAdmissionsService;
        $svc->setAttributes([
            'query' => $query,
        ]);
        $admissions = $svc->execute();

        // Append Query into Links
        $admissions->appends([ 'q' => $query ]);

        return $this->view('education.admissions.index', [
            'admissions' => $admissions,
        ]);
    }
}
