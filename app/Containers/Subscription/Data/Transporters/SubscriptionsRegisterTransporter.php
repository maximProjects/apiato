<?php

namespace App\Containers\Subscription\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class SubscriptionsRegisterTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'plan_type',
            'first_name',
            'last_name',
            'company_name',
            'company_number',
            'email',
            'phone',
            'address',
            'uid',
            'employees',
            'city',
            'zip'
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
