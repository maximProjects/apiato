<?php

namespace App\Containers\Job\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class JobTypeArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'type_id',
            'project_id',
            'user_id',
            'project_group_id',
            'price_per_hour',
            'price_per_hour_extra',
            'working_hours_planned',
            'budget_planned',
            'description',
            'name',
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
