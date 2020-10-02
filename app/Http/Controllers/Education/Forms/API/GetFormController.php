<?php

namespace App\Http\Controllers\Education\Forms\API;

use Illuminate\Http\Request;

use App\Services\Education\Forms\GetFormService;

use App\Http\Controllers\Controller;

class GetFormController extends Controller
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
        $this->middleware('admin');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id)
    {
        // Get Form
        $svc = new GetFormService;
        $svc->setParameters([ 'form_id' => $id ]);
        $form = $svc->execute();

        return $this->json($form->toArray());
    }
}
