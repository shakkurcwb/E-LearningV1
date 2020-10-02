<?php

namespace App\Models\Account;

use App\Traits\Account\Users\EncryptPassword;
use App\Traits\Account\Users\ApiTokenGenerator;
use App\Traits\Account\Users\ProfileProgression;
use App\Traits\Account\Users\PreferencesProgression;
use App\Traits\Account\Users\PreferredLocale;
use App\Traits\Account\Users\SluggableName;

use App\Traits\Merchant\Subscriptions\ActiveSubscriptionTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements MustVerifyEmail, HasLocalePreference
{
    use EncryptPassword, ApiTokenGenerator,
        ProfileProgression, PreferencesProgression,
        SluggableName, PreferredLocale;

    use ActiveSubscriptionTrait;

    use Notifiable, SoftDeletes;

    /**
     * The "booting" method of the model.
     *
     * @return Void
     */
    public static function boot()
    {
        parent::boot();

        // Generate API Token when user is created
        self::creating(function($model) {
            $model->api_token = self::generateApiToken();
        });
    }

    /**
     * The table associated with the model.
     *
     * @var String
     */
    protected $table = 'users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var Array
     */
    protected $fillable = [
        'role', 'state',
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var Array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var Array
     */
    protected $casts = [
        'last_login_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'credits' => 'integer',
        'reputation' => 'integer',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var Array
     */
    protected $with = [
        'settings', 'person', 'address', 'phone',
        'bank_account', 'preferences',
        'admissions', 'sessions',
        'subscriptions',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var Array
     */
    protected $appends = [
        'preferred_locale', 'profile_progression', 'preferences_progression',
        'active_subscription',
    ];

    /**
     * Relationship with Settings Model.
     * 
     */
    public function settings()
    {
        return $this->hasOne("App\Models\Account\SettingsModel", "user_id", "id");
    }

    /**
     * Relationship with Person Model.
     * 
     */
    public function person()
    {
        return $this->hasOne("App\Models\Account\PersonModel", "user_id", "id");
    }

    /**
     * Relationship with Address Model.
     * 
     */
    public function address()
    {
        return $this->hasOne("App\Models\Account\AddressModel", "user_id", "id");
    }

    /**
     * Relationship with Phone Model.
     * 
     */
    public function phone()
    {
        return $this->hasOne("App\Models\Account\PhoneModel", "user_id", "id");
    }

    /**
     * Relationship with Feedback Model.
     * 
     */
    public function feedbacks()
    {
        return $this->hasMany("App\Models\Account\FeedbackModel", "user_id", "id");
    }

    /**
     * Relationship with Bank Account Model.
     * 
     */
    public function bank_account()
    {
        return $this->hasOne("App\Models\Account\BankAccountModel", "user_id", "id");
    }

    /**
     * Relationship with Preferences Model.
     * 
     */
    public function preferences()
    {
        return $this->hasOne("App\Models\Account\PreferencesModel", "user_id", "id");
    }

    /**
     * Relationship with Admission Model.
     * 
     */
    public function admissions()
    {
        return $this->hasMany("App\Models\Education\AdmissionModel", "user_id", "id");
    }

    /**
     * Relationship with Answer Model.
     * 
     */
    public function answers()
    {
        return $this->hasMany("App\Models\Education\AnswerModel", "user_id", "id");
    }

    /**
     * Relationship with Subscription Model.
     * 
     */
    public function subscriptions()
    {
        return $this->hasMany("App\Models\Merchant\SubscriptionModel", "user_id", "id")->without([
            'user',
        ]);
    }

    /**
     * Relationship with Session Model.
     * 
     */
    public function sessions()
    {
        if ($this->role === "Student")
        {
            return $this->hasMany("App\Models\Education\SessionModel", "student_id", "id")->without('student');
        }
        else
        {
            return $this->hasMany("App\Models\Education\SessionModel", "tutor_id", "id")->without('tutor');
        }
    }
}