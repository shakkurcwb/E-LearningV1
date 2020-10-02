<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class PreferencesModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preferences';

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
        'biography', 'video',
        'availabilities',
        'allow_trial_sessions',
        'allow_public_view',
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
        'allow_trial_sessions' => 'boolean',
        'allow_public_view' => 'boolean',
        'availabilities' => 'array',
    ];

    /** Check if model has its required fields set */
    public function isFilled()
    {
        $biography = !empty($this->biography) ? true : false;
        return $biography;
    }
}