<?php

namespace App\Containers\Timer\Models;

use App\Containers\Task\Models\Task;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Parents\Models\Model;

class Timer extends Model
{
    protected $fillable = [
        'task_id',
        'time_registry_id',
        'state_id',
        'date_start',
        'date_end',
        'state_id',
        'total_time'
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

    public function timeRegistry() {
        return $this->belongsTo(TimeRegistry::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'timers';
}
