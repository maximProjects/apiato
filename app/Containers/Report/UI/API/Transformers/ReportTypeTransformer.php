<?php

namespace App\Containers\Report\UI\API\Transformers;

use App\Containers\Report\Models\ReportType;
use App\Ship\Parents\Transformers\Transformer;

class ReportTypeTransformer extends Transformer
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
     * @param ReportType $entity
     *
     * @return array
     */
    public function transform(ReportType $entity)
    {
        $response = [
            'object' => 'ReportType',
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
