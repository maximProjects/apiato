<?php

namespace App\Containers\Profile\UI\API\Transformers;

use App\Containers\Profile\Models\Profile;
use App\Ship\Parents\Transformers\Transformer;

class ProfileTransformer extends Transformer
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
     * @param Profile $entity
     *
     * @return array
     */
    public function transform(Profile $entity)
    {
        $response = [
            'object' => 'Profile',
            'id' => $entity->getHashedKey(),
            'first_name' => $entity->first_name,
            'last_name' => $entity->last_name,
            'address' => $entity->address,
            'phone' => $entity->phone,
            'email' => $entity->email,
            'notices' => $entity->notices,
            'position' => $entity->position,
            'birthday' => $entity->birthday,
            'gender' => $entity->gender,
            'addresses' => $entity->addresses()->get(),
            'avatar' => $entity->avatar(),
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
