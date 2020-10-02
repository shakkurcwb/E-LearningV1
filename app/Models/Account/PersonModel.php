<?php

namespace App\Models\Account;

use App\Traits\Account\People\AgeAttribute;
use App\Traits\Account\People\FullNameAttribute;

use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
    use AgeAttribute, FullNameAttribute;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'people';

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
        'first_name', 'middle_names', 'last_name',
        'document', 'birth', 'gender', 'nationality',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'age', 'full_name',
    ];

    /** Check if model has its required fields set */
    public function isFilled()
    {
        $first_name = !empty($this->first_name) ? true : false;
        $last_name = !empty($this->last_name) ? true : false;
        $document = !empty($this->document) ? true : false;
        $birth = !empty($this->birth) ? true : false;
        return $first_name && $last_name && $document && $birth;
    }
}