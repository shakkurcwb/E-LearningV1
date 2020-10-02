<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'phones';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_prefix', 'prefix', 'phone',
        'allow_messages',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        // 
    ];

    /** Check if model has its required fields set */
    public function isFilled()
    {
        $prefix = !empty($this->prefix) ? true : false;
        $phone = !empty($this->phone) ? true : false;
        return $prefix && $phone;
    }
}