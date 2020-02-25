<?php

namespace App\Containers\User\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UserTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'email',
            'password',
            'name',
            'gender',
            'birth',
            'role',
            'roles',
            'hourly_rate'
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
