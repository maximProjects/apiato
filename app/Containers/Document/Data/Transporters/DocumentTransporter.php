<?php

namespace App\Containers\Document\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class DocumentTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            "user_id",
            "project_id",
            "title",
            "description",
            "alt",
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
