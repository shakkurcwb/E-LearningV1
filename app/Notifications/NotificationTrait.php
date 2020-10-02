<?php

namespace App\Notifications;

trait NotificationTrait
{
    /**
     * Greetings Default Message.
     * 
     * @return String
     */
    public function greetings(): String
    {
        return __('Hello!');
    }

    /**
     * Footer Default Message.
     * 
     * @return String
     */
    public function footer(): String
    {
        return __('Thanks for being part of our community.');
    }

    /**
     * Success Icon.
     * 
     * @return String
     */
    public function successIcon(): String
    {
        return 'fa fa-check-circle text-success';
    }

    /**
     * Error Icon.
     * 
     * @return String
     */
    public function errorIcon(): String
    {
        return 'fa fa-fa-times-circle text-danger';
    }
}