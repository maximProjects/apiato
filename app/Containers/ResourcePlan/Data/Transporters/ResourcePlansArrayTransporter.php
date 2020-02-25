<?php

namespace App\Containers\ResourcePlan\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ResourcePlansArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'project_id',
            'date_start',
            'date_end',
            'number_employees_required',
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
