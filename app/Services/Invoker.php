<?php

namespace App\Services;

class Invoker
{
    protected $module, $entity, $action;

    /** Create Invoker Instance */
    public function __construct(String $module, String $entity, String $action)
    {
        $this->module = $module;
        $this->entity = $entity;
        $this->action = $action;
    }

    /** Reflect Target Instance */
    public function instance()
    {
        $classname = "App\\Services\\{$this->module}\\{$this->entity}\\{$this->action}Service";
        try { return new $classname; } catch (\Exception $e) {
            throw new \Exception("Fail to instanciate {$classname}.");
        }
    }

    /** Make Refrection Instance */
    public static function make($module, $entity, $action)
    {
        $reflection = new Invoker($module, $entity, $action);
        return $reflection->instance();
    }
}