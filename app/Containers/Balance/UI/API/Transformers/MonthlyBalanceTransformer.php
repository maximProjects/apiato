<?php

namespace App\Containers\Balance\UI\API\Transformers;

use App\Containers\Balance\Models\MonthlyBalance;
use App\Ship\Parents\Transformers\Transformer;

class MonthlyBalanceTransformer extends Transformer
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
    public function transform(MonthlyBalance $entity)
    {
        $response = [
            'object' => 'MonthlyBalance',
            'id' => $entity->getHashedKey(),
            'month_info' => $entity->monthlyHours,
            'user' => $entity->user,
            'hours_substr' => $entity->hours_substr,
            'hours_add' => $entity->hours_add,
            'hours_advance' => $entity->hours_advance,
            'custom_monthly_rate' => $entity->custom_monthly_rate,
            'notice' => $entity->notice,
            'notice_administrative' => $entity->notice_administrative,
            'month' => $entity->month,
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
