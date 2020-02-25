<?php

namespace App\Containers\Manager\UI\API\Transformers;

use App\Containers\Manager\Models\Manager;
use App\Ship\Parents\Transformers\Transformer;

class ManagerTransformer extends Transformer
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
     * @param Manager $entity
     *
     * @return array
     */
    public function transform(Manager $entity)
    {
        $response = [
            'object' => 'Manager',
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
