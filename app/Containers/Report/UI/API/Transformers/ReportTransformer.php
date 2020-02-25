<?php

namespace App\Containers\Report\UI\API\Transformers;

use App\Containers\Report\Models\Report;
use App\Ship\Parents\Transformers\Transformer;

class ReportTransformer extends Transformer
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
     * @param Report $entity
     *
     * @return array
     */
    public function transform(Report $entity)
    {
        $response = [
            'object' => 'Report',
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
