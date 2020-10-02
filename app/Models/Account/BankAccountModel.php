<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class BankAccountModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bank_accounts';

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
        'bank', 'agency', 'account',
        'preferred_currency',
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
        $bank = !empty($this->bank) ? true : false;
        $agency = !empty($this->agency) ? true : false;
        $account = !empty($this->account) ? true : false;
        return $bank && $agency && $account;
    }
}