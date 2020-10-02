<?php

namespace App\Models\Common;

use App\Models\Common\Scopes\HasGetAll;

class FeedbackModel
{
    use HasGetAll;

    protected $data;

    /**
     * Load the JSON data and make it available in $data.
     * 
     * @return Void
     */
    public function __construct()
    {
        $this->data = [
            'account' => __('general.feedbacks.account'),
            'payment' => __('general.feedbacks.payment'),
            'bug' => __('general.feedbacks.bug'),
            'suggestion' => __('general.feedbacks.suggestion'),
            'other' => __('general.feedbacks.other'),
        ];
    }
}