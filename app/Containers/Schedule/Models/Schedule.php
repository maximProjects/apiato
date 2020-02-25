<?php

namespace App\Containers\Schedule\Models;

use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Schedule extends Model
{
    protected $fillable = [
        'scheduler_id',
        'scheduler_type',
        'user_id',
        'date_start',
        'date_end',
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

    public function  user()
    {
        return $this->belongsTo(User::class);
    }

    public function scheduleable()
    {
        return $this->morphTo();
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'schedules';
}
