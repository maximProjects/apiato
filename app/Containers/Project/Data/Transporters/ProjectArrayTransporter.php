<?php

namespace App\Containers\Project\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ProjectArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            'reference',
            'name',
            'building_number',
            'property_number',
            'gnr',
            'bnr',
            'fnr',
            'section',
            'property_owner',
            'property_owner_phone',
            'property_owner_information',
            'property_developer',
            //Work related fields
            'date_start',
            'date_end',
            'working_hours_from',
            'working_hours_to',
            'price_per_hour',
            'price_per_hour_extra',
            'working_hours_planned',
            'budget_planned',
            'exclude_from_balance',
            'has_building_application_form',
            'has_work_safety_plan',
            'is_large_scale_project',
            'color_marker',
            'additional_information',
            'description',

            "addresses",
            'clients',
            'clients',
            'managers',
            'tags',
        ],
        'required'   => [
            // define the properties that MUST be set
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
