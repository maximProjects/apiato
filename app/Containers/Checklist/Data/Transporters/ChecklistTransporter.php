<?php

namespace App\Containers\Checklist\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ChecklistTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'project_id',
            'project_group_id',
            'state_id',
            'type_id',
            'is_group',
            'is_template',
            'contact_user_id',
            'name',
            'description',
            'date_start',
            'date_end',
            'percent',
            'checkpoints',
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
