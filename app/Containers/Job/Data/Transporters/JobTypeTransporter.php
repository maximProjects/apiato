<?php

namespace App\Containers\Job\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class JobTypeTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'type_id',
            'user_id',
            'project_id',
            'project_group_id',
            'planned_hours',
            'planned_quantity',
            'price_per_hour',
            'price_per_hour_extra',
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
