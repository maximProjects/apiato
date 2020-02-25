<?php

namespace App\Containers\Invoice\UI\API\Transformers;

use App\Containers\Invoice\Models\Invoice;
use App\Ship\Parents\Transformers\Transformer;

class InvoiceTransformer extends Transformer
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
     * @param Invoice $entity
     *
     * @return array
     */
    public function transform(Invoice $entity)
    {
        $response = [
            'object' => 'Invoice',
            'id' => $entity->getHashedKey(),
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'user' => $entity->user,
            'invoice_date' => $entity->invoice_date,
            'total' => $entity->total,
            'total_with_vat' => $entity->total_with_vat,
            'number' => $entity->number,
            'payment_date' => $entity->payment_date,
            'invoice_type' => $entity->invoice_type,
            'comment' => $entity->comment,
            'is_paid' => $entity->is_paid,
            'media' => $entity->media()->get(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
