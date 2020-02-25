<?php

namespace App\Containers\Tag\UI\API\Transformers;

use App\Containers\Tag\Models\Tag2;
use App\Ship\Parents\Transformers\Transformer;

class TagTransformer extends Transformer
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
     * @param Tag2 $entity
     *
     * @return array
     */
    public function transform(Tag2 $entity)
    {
        $response = [
            'object' => 'Tag',
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
