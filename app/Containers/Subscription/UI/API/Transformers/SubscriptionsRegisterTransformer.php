<?php

namespace App\Containers\Subscription\UI\API\Transformers;

use App\Containers\Subscription\Models\SubscriptionRegister;
use App\Ship\Parents\Transformers\Transformer;

class SubscriptionsRegisterTransformer extends Transformer
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
     * @param SubscriptionRegister $entity
     *
     * @return array
     */
    public function transform(SubscriptionRegister $entity)
    {
        $response = [
            'object' => 'SubscriptionRegister',
            'id' => $entity->getHashedKey(),
            'plan_type' => $entity->plan_type,
            'first_name' => $entity->first_name,
            'last_name' => $entity->last_name,
            'company_name' => $entity->company_name,
            'company_number' => $entity->company_number,
            'email' => $entity->email,
            'address' => $entity->address,
            'uid' => $entity->uid,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'employees' => $entity->employees,
            'city' => $entity->city,
            'zip' => $entity->zip,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
