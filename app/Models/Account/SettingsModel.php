<?php

namespace App\Models\Account;

use App\Traits\Account\Settings\AvatarUrl;
use App\Traits\Account\Settings\BackgroundUrl;

use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use AvatarUrl, BackgroundUrl;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

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
        'theme',
        'locale', 'timezone', 'currency',
        'allow_newsletters', 'show_hints',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'allow_newsletters' => 'boolean',
        'show_hints' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var Array
     */
    protected $appends = [
        'avatar_url', 'background_url',
    ];

    /** Check if model has its required fields set */
    public function isFilled()
    {
        $locale = !empty($this->locale) ? true : false;
        $timezone = !empty($this->timezone) ? true : false;
        $currency = !empty($this->currency) ? true : false;
        return $locale && $timezone && $currency;
    }
}