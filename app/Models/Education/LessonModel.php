<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lessons';

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
        'session_id', 'form_id',
        'auditor_id', 'auditted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'form_id',
        'completed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed_at' => 'datetime',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'user', 'form',
    ];

    /**
     * Relationship with User Model.
     * 
     */
    public function user()
    {
        return $this->belongsTo("App\Models\Account\UserModel", "user_id", "id");
    }

    /**
     * Relationship with Form Model.
     * 
     */
    public function form()
    {
        return $this->belongsTo("App\Models\Education\FormModel", "form_id", "id");
    }
}