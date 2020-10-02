<?php

namespace App\Http\Controllers\Account\Feedback;

use Illuminate\Http\Request;

use App\Events\Account\FeedbackCreatedEvent;

use App\Services\Account\Feedbacks\StoreFeedbackService;

use App\Http\Controllers\ActionController;

class StoreController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');

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
            'subject' => [ 'required', 'string', 'max:64' ],
            'description' => [ 'required', 'string', 'max:2048' ],
        ];
    
        $messages = [
            'subject' => __('account.attributes.feedback.subject'),
            'description' => __('account.attributes.feedback.description'),
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
            $svc = new StoreFeedbackService;
            $svc->setAttributes($attributes);
            $feedback = $svc->execute();

            // Trigger Event
            event(new FeedbackCreatedEvent($feedback));

            return $this->redirect('/feedback')->with('success', __('account.alerts.feedback.store_success'));

        } catch (\Exception $e) {

            return $this->redirect('/feedback')->with('error', __('account.alerts.feedback.store_failed'));

        }
    }
}