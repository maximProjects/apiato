<?php

namespace App\Containers\Subscription\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class PlanArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
          'name',
          'description',
          'price',
          'currency',
          'duration',
          'metadata',
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
