<?php

namespace App\Containers\Balance\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class BalanceArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'project_id',
            'project_group_id',
            'time_registry_id',
            'hours',
            'extra_time',
            'sum',
            'balance_date'
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
