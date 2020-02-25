<?php

namespace App\Containers\Routine\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class RoutineTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'project_id',
            'project_group_id',
            'state_id',
            'name',
            'description',
            // enter all properties here

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
