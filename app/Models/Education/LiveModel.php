<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;

class LiveModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lives';

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
        'session_id',
        'started_at', 'ended_at',
        'tutor_logged_at', 'student_logged_at',
        'history',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'session_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'tutor_logged_at' => 'datetime',
        'student_logged_at' => 'datetime',
    ];
}