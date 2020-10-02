<?php

namespace App\Http\Controllers\Education\Forms;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class BuilderController extends Controller
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
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        return $this->view('education.forms.builder', [
            'id' => $id,
        ]);
    }
}
