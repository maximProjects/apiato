<?php

namespace App\Containers\Invoice\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class InvoiceArrayTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'array',
        'properties' => [
            // enter all properties here
            'project_id',
            'project_group_id',
            'user_id',
            'invoice_date',
            'total',
            'number',
            'payment_date',
            'invoice_type',
            'comment',
            'is_paid',
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
