<?php

namespace App\Containers\Statistic\UI\API\Transformers;

use App\Containers\Statistic\Models\Statistic;
use App\Ship\Parents\Transformers\Transformer;

class StatisticTransformer extends Transformer
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
     * @param Statistic $entity
     *
     * @return array
     */
    public function transform(Statistic $entity)
    {
        $response = [
            'object' => 'Statistic',
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
