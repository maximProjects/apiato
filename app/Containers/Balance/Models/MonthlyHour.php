<?php

namespace App\Containers\Balance\Models;

use App\Ship\Parents\Models\Model;

class MonthlyHour extends Model
{
    protected $fillable = [
        "period",
        "days",
        "hours"
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

    public function monthBalance()
    {
        return $this->HasOne(MonthlyBalance::class);
    }


    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'monthly_hours';
}
