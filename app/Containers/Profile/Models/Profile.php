<?php

namespace App\Containers\Profile\Models;

use App\Containers\Address\Models\Address;
use App\Containers\Media\Models\Media;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone',
        'email',
        'notices',
        'position',
        'birthday',
        'gender',
        'media_id',
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

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'location');
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'profiles';
}
