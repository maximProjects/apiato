<?php

namespace App\Containers\Accounting\UI\API\Transformers;

use App\Containers\Accounting\Models\Accounting;
use App\Ship\Parents\Transformers\Transformer;

class AccountingTransformer extends Transformer
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
     * @param Accounting $entity
     *
     * @return array
     */
    public function transform(Accounting $entity)
    {
        $response = [
            'object' => 'Accounting',
            'id' => $entity->getHashedKey(),
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
