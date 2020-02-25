<?php

namespace App\Containers\Profile\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ProfileTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'first_name',
            'last_name',
            'address',
            'phone',
            'email',
            'notices',
            'position',
            'birthday',
            'gender',
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
