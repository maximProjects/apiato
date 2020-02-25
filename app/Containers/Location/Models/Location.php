<?php

namespace App\Containers\Location\Models;

use App\Containers\Company\Models\Company;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Models\Model;

class Location extends Model
{
    protected $fillable = [
        'location_type',
        'location_id',
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

    public function project() {
        return $this->morphedByMany(Project::class, 'project');
    }

    public function company() {
        return $this->morphedByMany(Company::class, 'company');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'locations';
}
