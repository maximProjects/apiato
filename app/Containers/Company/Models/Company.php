<?php

namespace App\Containers\Company\Models;

use App\Containers\Address\Models\Address;
use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;

class Company extends Model
{
    protected $fillable = [
        'name',
        'company_code',
        'vat_code',
        'address_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function address() {
        return $this->belongsTo(Address::class, 'address_id');
    }

//    public function users()
//    {
//        return $this->belongsToMany(User::class, "company_users", "company_id", "user_id");
//    }


//    public function addresses()
//    {
//        return $this->morphToMany(Address::class, 'location');
//    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'companies';
}
