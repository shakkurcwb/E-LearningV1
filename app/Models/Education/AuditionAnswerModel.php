<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;

class AuditionAnswerModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audition_answers';

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
        'audit_id', 'answer_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'audit_id', 'answer_id',
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
        'answer',
    ];

    /**
     * Relationship with Answer Model.
     * 
     */
    public function answer()
    {
        return $this->belongsTo("App\Models\Education\AnswerModel", "answer_id", "id");
    }
}