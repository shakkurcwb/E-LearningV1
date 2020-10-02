<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanModel extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plans';

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
        'name', 'price',
        'interval', 'is_recommended',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_recommended' => 'boolean',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'features',
    ];

    /**
     * Relationship with Feature Model.
     * 
     */
    public function features()
    {
        return $this->hasOne("App\Models\Merchant\FeatureModel", "plan_id", "id")
            ->withDefault([
                'frequency' => '',
                'duration' => '',
            ]);
    }
}