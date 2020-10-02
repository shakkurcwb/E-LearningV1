<?php

namespace App\Services;

use Illuminate\Support\Arr;

use App\Libraries\Logger;

abstract class Service
{
    /** Parameters */
    private $parameters = [];

    /** Attributes */
    private $attributes = [];

    /** Constructor */
    public function __construct()
    {
        //
    }

    /** Reset Service Properties */
    public function reset(): Void
    {
        $this->parameters = [];
        $this->attributes = [];
    }

    /** Set Parameters */
    public function setParameters(Array $parameters = []): Void
    {
        $this->parameters = $parameters;
    }

    /** Append Parameter */
    public function appendParameter(String $key, $value): Void
    {
        $this->parameters[$key] = $value;
    }

    /** Set Attributes */
    public function setAttributes(Array $attributes = []): Void
    {
        $this->attributes = $attributes;
    }

    /** Append Attribute */
    public function appendAttribute(String $key, $value): Void
    {
        $this->attributes[$key] = $value;
    }

    /** Get Parameters */
    public function getParameters()
    {
        return $this->parameters;
    }

    /** Get Parameter */
    public function getParameter(String $key)
    {
        return Arr::get($this->parameters, $key);
    }

    /** Get Attributes */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /** Get Attribute */
    public function getAttribute(String $key)
    {
        return Arr::get($this->attributes, $key);
    }

    /**
     * Adapter to report an exception.
     * 
     * @param \Exception $e
     * @return Void
     */
    public function report(\Exception $e): Void
    {
        Logger::report($e);
    }
}