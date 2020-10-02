<?php

namespace App\Models\Common\Scopes;

trait HasGetAll
{
    /**
     * Returns an array with all data formatted.
     * 
     * @return Array
     */
    public function getAll(): Array
    {
        return collect($this->data)->map(function ($value, $key) {
            return [
                'id' => $key,
                'value' => $value,
            ];
        })->toArray();
    }
}