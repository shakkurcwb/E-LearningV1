<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forms';

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
        'user_id',
        'title', 'type', 'state',
        'description', 'tags',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'user', 'questions',
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
     * Relationship with Question Model.
     * 
     */
    public function questions()
    {
        return $this->hasMany("App\Models\Education\QuestionModel", "form_id", "id");
    }
}