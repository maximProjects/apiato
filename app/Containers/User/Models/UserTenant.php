<?php

namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;

class UserTenant extends Model
{
    protected $fillable = [
        'user_id'
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
    public function user()
    {
        return $this->hasOne(User::class);

    }
    protected $resourceKey = 'user_tenant';
    protected $table = 'user_tenant';
}
