<?php

namespace App\Containers\Discrepancy\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class CreateDiscrepancyTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            "project_id",
            'project_group_id',
            "state_id",
            "type_id",
            "description",
            "date_start",
            "date_end",
            "budget_planned",
            "price_per_hour",
            "price_per_hour_extra",
            "created_by",
            "assigned_to",
            "media",
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
