<?php

namespace App\Containers\Job\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class JobArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'description',
            'time_registry_id',
            'date_end',
            'date_start',
            'state_id',
            'task',
            'hourly_rate',
            'fixed_amount',
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
