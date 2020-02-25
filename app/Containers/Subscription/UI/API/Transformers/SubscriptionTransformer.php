<?php

namespace App\Containers\Subscription\UI\API\Transformers;

use App\Containers\Subscription\Models\Subscription;
use App\Ship\Parents\Transformers\Transformer;

class SubscriptionTransformer extends Transformer
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
     * @param Subscription $entity
     *
     * @return array
     */
    public function transform(Subscription $entity)
    {
        $response = [
            'object' => 'Subscription',
            'id' => $entity->getHashedKey(),
            'user' => $entity->user,
            'users' => $entity->users,
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
