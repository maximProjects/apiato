<?php

namespace App\Containers\Schedule\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ScheduleArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'schedule_id',
            'user_id',
            'date_start',
            'date_end',
            'duration',
            'free_days',
            'hours',
            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required'   => [
            // define the properties that MUST be set
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
