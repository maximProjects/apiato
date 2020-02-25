<?php

namespace App\Containers\Deviation\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class DeviationTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'project_id',
            'checkpoint_id',
            'state_id',
            'type_id',
            'date_start',
            'date_end',
            'suggeseted_actions',
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
