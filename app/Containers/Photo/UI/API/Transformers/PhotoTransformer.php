<?php

namespace App\Containers\Photo\UI\API\Transformers;

use App\Containers\Photo\Models\Photo;
use App\Ship\Parents\Transformers\Transformer;

class PhotoTransformer extends Transformer
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
     * @param Photo $entity
     *
     * @return array
     */
    public function transform(Photo $entity)
    {
        $response = [
            'object' => 'Photo',
            'id' => $entity->getHashedKey(),
            'title' => $entity->title,
            'description' => $entity->description,
            'alt' => $entity->alt,
            'meta' => $entity->meta,
            'project_id' => $entity->project_id,
            'user' => $entity->user,
            'media' => $entity->media,
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
