<?php

namespace App\Containers\Address\UI\API\Transformers;

use App\Containers\Address\Models\Address;
use App\Ship\Parents\Transformers\Transformer;

class AddressTransformer extends Transformer
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
     * @param Address $entity
     *
     * @return array
     */
    public function transform(Address $entity)
    {
        $response = [
            'object' => 'Address',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'address_1'=> $entity->address_1,
            'address_2'=> $entity->address_2,
            'country_id'=> $entity->country_id,
            'country_state_id'=> $entity->country_state_id,
            'city'=> $entity->city,
            'zip_code'=> $entity->zip_code,
            'location_lat'=> $entity->location_lat,
            'location_lng'=> $entity->location_lng,
            'first_name'=> $entity->first_name,
            'last_name'=> $entity->last_name,
            'contact_email'=> $entity->contact_email,
            'contact_phone'=> $entity->contact_phone,
            'additional_information'=> $entity->additional_information,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
