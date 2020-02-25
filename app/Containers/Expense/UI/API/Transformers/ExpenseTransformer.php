<?php

namespace App\Containers\Expense\UI\API\Transformers;

use App\Containers\Expense\Models\Expense;
use App\Ship\Parents\Transformers\Transformer;

class ExpenseTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Expense $entity
     *
     * @return array
     */
    public function transform(Expense $entity)
    {
        $response = [
            'object' => 'Expense',
            'id' => $entity->getHashedKey(),
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'user' => $entity->user,
            'supplier' => $entity->supplier,
            'type_id' => (int)$entity->type_id,
            'document_type_id' => $entity->document_type_id,
            'number' => $entity->number,
            'extra' => $entity->extra,
            'date' => strtotime($entity->date),
            'vat' => $entity->vat,
            'total' => $entity->total,
            'total_with_vat' => $entity->total_with_vat,
            'comment' => $entity->comment,
            'state_id' => (int)$entity->state_id,
            'tenant_id' => $entity->tenant_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'deleted_at' => $entity->deleted_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
