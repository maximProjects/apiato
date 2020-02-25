<?php

namespace App\Containers\Timer\UI\API\Transformers;

use App\Containers\Timer\Models\Timer;
use App\Ship\Parents\Transformers\Transformer;

class TimerTransformer extends Transformer
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
     * @param Timer $entity
     *
     * @return array
     */
    public function transform(Timer $entity)
    {
        $response = [
            'object' => 'Timer',
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
