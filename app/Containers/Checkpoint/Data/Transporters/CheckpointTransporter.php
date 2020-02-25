<?php

namespace App\Containers\Checkpoint\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CheckpointTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'name',
            'description',
            'checklist_id',
            'state_id',
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
