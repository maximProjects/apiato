<?php

namespace App\Containers\Subscription\Models;

use App\Ship\Parents\Models\Model;

class SubscriptionRegister extends Model
{
    protected $fillable = [
        'plan_type',
        'first_name',
        'last_name',
        'company_name',
        'company_number',
        'email',
        'phone',
        'address',
        'uid',
        'employees',
        'city',
        'zip'
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

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'subscriptions_register';
    protected $table = 'subscriptions_register';
}
