<?php

namespace App\Containers\Balance\UI\API\Transformers;

use App\Containers\Balance\Models\MonthlyHour;
use App\Ship\Parents\Transformers\Transformer;

class MonthlyHoursTransformer extends Transformer
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
    public function transform(MonthlyHour $entity)
    {
        $response = [
            'object' => 'MonthlyHour',
            'id' => $entity->getHashedKey(),
            'period' => $entity->period,
            'days' => $entity->days,
            'hours' => $entity->hours,
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
