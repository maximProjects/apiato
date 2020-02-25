<?php

namespace App\Containers\Project\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ProjectGroupArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'project_id',
            'state_id',
            'reference',
            'code',
            'name',
            'date_start',
            'date_end',
            'working_hours_planned',
            'budget_planned',
            'number_employees_required',
            'description',
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
