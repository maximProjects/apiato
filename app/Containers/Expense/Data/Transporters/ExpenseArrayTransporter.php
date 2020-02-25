<?php

namespace App\Containers\Expense\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class ExpenseArrayTransporter extends Transporter
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
            'employee_id',
            'manager_id',
            'type_id',
            'document_type_id',
            'date',
            'supplier',
            'number',
            'status_id',
            'extra',
            'vat',
            'total',
            'total_with_vat',
            'comment',
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
