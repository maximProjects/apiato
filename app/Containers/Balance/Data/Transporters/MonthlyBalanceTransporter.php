<?php

namespace App\Containers\Balance\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class MonthlyBalanceTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'user_id',
            'hours_substr',
            'hours_add',
            'hours_advance',
            'custom_monthly_rate',
            'notice',
            'notice_administrative',
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
