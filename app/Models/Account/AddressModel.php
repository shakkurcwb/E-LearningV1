<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

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
        'address', 'number', 'unit', 'complement',
        'district', 'city', 'zip_code', 'province', 'country',
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
        $address = !empty($this->address) ? true : false;
        $number = !empty($this->number) ? true : false;
        $zip_code = !empty($this->zip_code) ? true : false;
        $country = !empty($this->country) ? true : false;
        return $address && $number && $zip_code && $country;
    }
}