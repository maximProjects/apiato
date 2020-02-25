<?php

namespace App\Containers\TimeRegistry\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class TimeRegistryTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
          'id',
          'user_id',
          'project_id',
          'project_group_id',
          'date_start',
          'date_end',
          'extra_time',
          'description',
          'latitude_start',
          'latitude_end',
          'longitude_start',
          'longitude_end',
          'location_end',
          'state_id',
          'type_id',
          'confirmed_hours',
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
