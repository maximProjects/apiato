<?php

namespace App\Containers\Subscription\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class SubscriptionsUpdatePlanTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            'features',
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
