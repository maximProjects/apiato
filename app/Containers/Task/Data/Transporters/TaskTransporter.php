<?php

namespace App\Containers\Task\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class TaskTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            "state_id",
            "description",
            "date_start",
            "date_end",
            "budget_planned",
            "price_per_hour",
            "price_per_hour_extra",
            "job_types",
            "duration",
            "qnt",
            "priority",
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
