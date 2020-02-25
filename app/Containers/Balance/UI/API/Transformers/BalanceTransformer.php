<?php

namespace App\Containers\Balance\UI\API\Transformers;

use App\Containers\Balance\Models\Balance;
use App\Ship\Parents\Transformers\Transformer;

class BalanceTransformer extends Transformer
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
     * @param Balance $entity
     *
     * @return array
     */
    public function transform(Balance $entity)
    {
        $response = [
            'object' => 'Balance',
            'id' => $entity->getHashedKey(),
            'hours' => $entity->hours,
            'extra_time' => $entity->extra_time,
            'sum' => $entity->sum,
            'user' => $entity->user,
            'is_val' => $entity->is_val,
            'project' => $entity->project(),
            'projectGroup' => $entity->projectGroup(),
            'timeRegistry' => $entity->TimeRegistry(),
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
