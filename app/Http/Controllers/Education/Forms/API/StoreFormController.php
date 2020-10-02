<?php

namespace App\Http\Controllers\Education\Forms\API;

use Illuminate\Http\Request;

use App\Services\Education\Forms\StoreFormService;

use App\Http\Controllers\ActionController;

class StoreFormController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
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
        // Preparing Validator
        $rules = [
            'title' => [ 'required', 'string' ],
            'type' => [ 'required', 'string' ],
            'description' => [ 'nullable', 'string' ],
            'tags' => [ 'nullable', 'string' ],
            'questions' => [ 'required', 'array' ],
            'questions.*.title' => [ 'required', 'string', 'max:128' ],
            'questions.*.type' => [ 'required', 'string', 'max:16' ],
            'questions.*.is_matchable' => [ 'nullable', 'boolean' ],
            'questions.*.show_matches' => [ 'nullable', 'boolean' ],
            'questions.*.options' => [ 'nullable', 'array' ],
            'questions.*.correct_answers' => [ 'nullable', 'array' ],
        ];

        $messages = [
            'title' => __('education.attributes.form.title'),
            'type' => __('education.attributes.form.type'),
            'description' => __('education.attributes.form.description'),
            'tags' => __('education.attributes.form.tags'),
            'questions' => __('education.attributes.form.questions'),
            'questions.*.title' => __('education.attributes.question.title'),
            'questions.*.type' => __('education.attributes.question.type'),
            'questions.*.is_matchable' => __('education.attributes.question.is_matchable'),
            'questions.*.show_matches' => __('education.attributes.question.show_matches'),
            'questions.*.options' => __('education.attributes.question.options'),
            'questions.*.correct_answers' => __('education.attributes.question.correct_answers'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);
        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Custom Attributes
        $attributes['user_id'] = $this->request->user()->id;

        try {

            // Execute Service(s)
            $svc = new StoreFormService;
            $svc->setAttributes($attributes);
            $form = $svc->execute();

            return $this->json($form->toArray(), 201);

        } catch (\Exception $e) {

            return $this->json([], 400);

        }
    }
}