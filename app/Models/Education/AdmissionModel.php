<?php

namespace App\Models\Education;

use App\Traits\Education\Admissions\StateExtension;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionModel extends Model
{
    use SoftDeletes, Notifiable;

    use StateExtension;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admissions';

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
        'user_id', 'form_id', 'admin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'form_id', 'admin_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'form',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var Array
     */
    protected $appends = [
        'state', 'answers',
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

    /**
     * Relationship with User Model.
     * 
     */
    public function admin()
    {
        return $this->belongsTo("App\Models\Account\UserModel", "admin_id", "id");
    }

    /**
     * Relationship with Answer Model.
     * 
     */
    public function getAnswersAttribute()
    {
    return AnswerModel::where('user_id', $this->user_id)
        ->where('form_id', $this->form_id)
        ->get();
    }
}