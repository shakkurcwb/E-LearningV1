<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditionModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auditions';

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
        'user_id', 'session_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'session_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'user', 'session', 'answers',
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
     * Relationship with Session Model.
     * 
     */
    public function session()
    {
        return $this->belongsTo("App\Models\Education\SessionModel", "session_id", "id");
    }

    /**
     * Relationship with Answer Model.
     * 
     */
    public function answers()
    {
        return $this->hasMany("App\Models\Education\AuditionAnswerModel", "audit_id", "id");
    }
}