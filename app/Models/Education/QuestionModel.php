<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

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
        'form_id',
        'title', 'type', 'order',
        'options', 'correct_answers',
        'is_required',
        'is_matchable', 'show_matches',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'form_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_required' => 'boolean',
        'is_matchable' => 'boolean',
        'show_matches' => 'boolean',
        'order' => 'integer',
        'options' => 'array',
        'correct_answers' => 'array',
    ];

    /**
     * Relationship with Form Model.
     * 
     */
    public function form()
    {
        return $this->belongsTo("App\Models\Education\FormModel", "form_id", "id");
    }

}