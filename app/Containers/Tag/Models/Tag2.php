<?php

namespace App\Containers\Tag\Models;

use App\Containers\Discrepancy\Models\Discrepancy;
use App\Ship\Parents\Models\Model;

class Tag2 extends Model
{
    protected $fillable = [

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
    public function discrepancies()
    {
        return $this->morphedByMany(Discrepancy::class, 'taggable');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'tags';
}
