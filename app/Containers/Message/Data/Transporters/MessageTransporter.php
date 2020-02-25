<?php

namespace App\Containers\Message\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class MessageTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here
            'from_id',
            'to',
            'cc',
            'subject',
            'content',
            'state_id',
            'type_id',
            'recipients',
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
