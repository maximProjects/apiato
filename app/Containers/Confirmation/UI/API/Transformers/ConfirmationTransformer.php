<?php

namespace App\Containers\Confirmation\UI\API\Transformers;

use App\Containers\Confirmation\Models\Confirmation;
use App\Ship\Parents\Transformers\Transformer;

class ConfirmationTransformer extends Transformer
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
     * @param Confirmation $entity
     *
     * @return array
     */
    public function transform(Confirmation $entity)
    {
        $response = [
            'object' => 'Confirmation',
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
