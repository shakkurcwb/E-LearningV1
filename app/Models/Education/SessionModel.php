<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'tutor_id',
        'start_at', 'end_at',
        'state', 'cost',
        'additional_info',
        'explanation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'student_id', 'tutor_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'cost' => 'integer',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'student', 'tutor', 'live',
    ];

    /**
     * Relationship with User Model.
     * 
     */
    public function student()
    {
        return $this->belongsTo("App\Models\Account\UserModel", "student_id", "id");
    }

    /**
     * Relationship with User Model.
     * 
     */
    public function tutor()
    {
        return $this->belongsTo("App\Models\Account\UserModel", "tutor_id", "id");
    }

    /**
     * Relationship with Live Model.
     * 
     */
    public function live()
    {
        return $this->hasOne("App\Models\Education\LiveModel", "session_id", "id");
    }

    public function isLive()
    {
        if (now() >= $this->start_at->addMinutes(-30) && now() < $this->end_at)
        {
            return true;
        }

        return false;
    }
}