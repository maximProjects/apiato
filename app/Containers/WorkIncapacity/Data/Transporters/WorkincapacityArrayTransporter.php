<?php

namespace App\Containers\Workincapacity\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class WorkincapacityArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'user_id',
            'type_id',
            'date_start',
            'date_end',
            'comment',
            'status',
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
