<?php

namespace App\Containers\User\Models;

use App\Containers\Address\Models\Address;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Document\Models\Document;
use App\Containers\Employee\Models\Employee;
use App\Containers\Expense\Models\Expense;
use App\Containers\Job\Models\Job;
use App\Containers\Job\Models\JobType;
use App\Containers\Manager\Models\Manager;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Payment\Models\PaymentAccount;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Containers\Profile\Models\Profile;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Subscription\Models\Subscription;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Parents\Models\UserModel;
use App\Containers\Photo\Models\Photo;
use App\Containers\Task\Models\Task;
use App\Containers\Client\Models\Client;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property bool $confirmed
 * @property string|null $gender
 * @property string|null $birth
 * @property string|null $device
 * @property string|null $platform
 * @property bool $is_client
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property string|null $social_provider
 * @property string|null $social_nickname
 * @property string|null $social_id
 * @property string|null $social_token
 * @property string|null $social_token_secret
 * @property string|null $social_refresh_token
 * @property string|null $social_expires_in
 * @property string|null $social_avatar
 * @property string|null $social_avatar_original
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \App\Containers\Employee\Models\Employee $employee
 * @property-read \App\Containers\Manager\Models\Manager $manager
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Payment\Models\PaymentAccount[] $paymentAccounts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship\Parents\Models\UserModel permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship\Parents\Models\UserModel role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereIsClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialAvatarOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialExpiresIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereSocialTokenSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $profile_type
 * @property int|null $profile_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\User\Models\User whereProfileType($value)
 */
class User extends UserModel implements ChargeableInterface
{

    use ChargeableTrait;
    use AuthorizationTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
        'hourly_rate',
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function employee()
    {
        return $this->hasOne(Employee::class);
    }


    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function paymentAccounts()
    {
        return $this->hasMany(PaymentAccount::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'user_project', 'user_id', 'project_id');
    }

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class, 'user_checklist', 'responsible_user_id', 'checklist_id');
    }

    public function discrepancies()
    {
        return $this->hasMany(Discrepancy::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public function timeRegistries()
    {
        return $this->hasMany(TimeRegistry::class);
    }

    public function discrepancies_from()
    {
        return $this->belongsToMany(Discrepancy::class, 'discrepancy_user', 'user_id', 'discrepancy_id')
            ->withPivot('type')->withTimestamps();
    }

    public function discrepancies_to()
    {
        return $this->belongsToMany(Discrepancy::class, 'discrepancy_user', 'user_id', 'discrepancy_id')
            ->withPivot('type')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function jobTypes()
    {
        return $this->hasMany(JobType::class);
    }

    public function deviations()
    {
        return $this->hasMany(Deviation::class);
    }

  public function subscription()
  {
    return $this->hasOne(Subscription::class);
  }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_users', 'user_id', 'subscription_id');
    }


    public function projectSchedule()
    {
        return $this->morphedByMany(Project::class, 'schedule');
    }

    public function getTenantId()
    {
//        dump($this->id);
        $subscription = $this->subscriptions()->first();
//        dump($this->subscriptions()->get()->toArray());
//        dump($this->id);

//        $subscribtionUser = $subscription->user()->first();
//        $tenantObj = UserTenant::where('user_id', '=', $subscribtionUser->id)->first()->id;

       // return $tenantObj;

        return $subscription->id;
    }


    public function projectGroupSchedule()
    {
        return $this->morphedByMany(ProjectGroup::class, 'schedule');
    }

    public function checkPermission($permissions = [])
    {
        $subscription = $this->subscriptions()->first();
        if(env('APP_ENV') == 'testing') {
            $errors = [];
            return $errors;
        }

        if($subscription == null) {
            $errors[] = "Your haven't subscribtion";
            return $errors;
        }
        $errors = [];
        if ($subscription && $subscription->hasActiveSubscription()) {
            $plan = $subscription->activeSubscription();

            //dump($plan->features()->code('update-checklist')->first());
            //dump($permissions);
            if(!isset($permissions["permissions"])) {
                $errors[] = "Your don`t have permissions to access this resource";
                return $errors;
            }
            if ($permissions["permissions"]) {
                if ($plan->features()->code($permissions["permissions"])->first() == null) {
                    $errors[] = "Your don`t have permissions to access this resource";
                }
            }
        } else {
            $errors[] = "Your plan is not activated";
        }


        // comment this line
        $errors = [];
        return $errors;
    }

    public function workIncapacities()
    {
       return $this->hasMany(WorkIncapacity::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'location');
    }
}
