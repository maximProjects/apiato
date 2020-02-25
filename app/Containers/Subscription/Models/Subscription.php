<?php

namespace App\Containers\Subscription\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Rennokki\Plans\Traits\HasPlans;

class Subscription extends Model
{
  use HasPlans;
    protected $fillable = [
      'user_id',
      'plan_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function users()
    {
      return $this->belongsToMany(User::class, 'subscription_users','subscription_id', 'user_id');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'subscriptions';
}
