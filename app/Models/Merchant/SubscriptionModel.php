<?php

namespace App\Models\Merchant;

use Illuminate\Notifications\Notifiable;

use App\Traits\Merchant\Subscriptions\TotalPriceTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionModel extends Model
{
    use SoftDeletes, Notifiable;

    use TotalPriceTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscriptions';

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
        'user_id', 'plan_id', 'coupon_id',
        'quantity', 'state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'plan_id', 'coupon_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'total',
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
        'plan', 'user', 'coupon', 'invoices',
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
     * Relationship with Plan Model.
     * 
     */
    public function plan()
    {
        return $this->belongsTo("App\Models\Merchant\PlanModel", "plan_id", "id");
    }

    /**
     * Relationship with Coupon Model.
     * 
     */
    public function coupon()
    {
        return $this->belongsTo("App\Models\Merchant\CouponModel", "coupon_id", "id");
    }

    /**
     * Relationship with Invoice Model.
     * 
     */
    public function invoices()
    {
        return $this->hasMany("App\Models\Merchant\InvoiceModel", "subscription_id", "id");
    }
}