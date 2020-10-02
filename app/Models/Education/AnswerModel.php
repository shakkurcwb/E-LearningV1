<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

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
        'user_id', 'question_id',
        'form_id', 'session_id',
        'answer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'form_id',
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
        'question',
    ];

    public function setAnswerAttribute($value)
    {
        if (is_array($value)) { $this->attributes['answer'] = json_encode($value); }
        else { $this->attributes['answer'] = $value; }
    }

    public function getAnswerAttribute($value)
    {
        if (substr($value, 0, 1) === '{')
        {
            return json_decode($value, true);
        }
        if (substr($value, 0, 1) === '[')
        {
            return json_decode($value, true);
        }
        return $value;
    }

    /**
     * Relationship with User Model.
     * 
     */
    public function user()
    {
        return $this->belongsTo("App\Models\Account\UserModel", "user_id", "id");
    }

    /**
     * Relationship with Question Model.
     * 
     */
    public function question()
    {
        return $this->belongsTo("App\Models\Education\QuestionModel", "question_id", "id");
    }
}