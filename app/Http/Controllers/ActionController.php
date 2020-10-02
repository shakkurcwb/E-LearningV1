<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

abstract class ActionController extends Controller
{
    protected $request;

    protected $rules = [], $messages = [], $attributes = [];

    /**
     * Create a new action controller instance.
     *
     * @param Request $request
     * @return Void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get attributes from a request.
     * 
     * @return Array
     */
    public function getPayload(): Array
    {
        return $this->request->except([ '_token', '_method' ]);
    }

    /**
     * Set attributes.
     * 
     * @param Array $attributes
     * @return Void
     */
    public function setAttributes(Array $attributes = []): Void
    {
        $this->attributes = $attributes;
    }

    /**
     * Set validation rules.
     * 
     * @param Array $rules
     * @return Void
     */
    public function setValidationRules(Array $rules = []): Void
    {
        $this->rules = $rules;
    }

    /**
     * Set validation messages.
     * 
     * @param Array $messages
     * @return Void
     */
    public function setValidationMessages(Array $messages = []): Void
    {
        $this->messages = $messages;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    private function validator(): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($this->attributes, $this->rules, [], $this->messages);
    }

    /**
     * Validate payload and return attributes or fail with error.
     * 
     * @return Array
     */
    public function validateOrFail(): Array
    {
        return $this->validator()->validate();
    }
}