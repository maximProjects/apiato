<?php

namespace App\Containers\Address\Models;

use App\Containers\Company\Models\Company;
use App\Containers\Profile\Models\Profile;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Models\Model;
//use Torzer\Awesome\Landlord\BelongsToTenants;

/**
 * App\Containers\Address\Models\Address
 *
 * @property int $id
 * @property string $address_1
 * @property string $address_2
 * @property int $country_id
 * @property int $country_state_id
 * @property string $zip_code
 * @property string $location_lat
 * @property string $location_lng
 * @property string $first_name
 * @property string $last_name
 * @property string $contact_email
 * @property string $contact_phone
 * @property string $additional_information
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereCountryStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereLocationLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereLocationLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Address\Models\Address whereZipCode($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
   // use BelongsToTenants;

    protected $fillable = [
        "address_1",
        "address_2",
        "country_id",
        "country_state_id",
        "city",
        "zip_code",
        "location_lat",
        "location_lng",
        "first_name",
        "last_name",
        "contact_email",
        "contact_phone",
        "additional_information",
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'pivot',
        'tenant_id'
    ];
    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function project()
    {
        return $this->morphedByMany(Project::class, 'location');
    }

    public function profile()
    {
        return $this->morphedByMany(Profile::class, 'location');
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'addresses';
}
