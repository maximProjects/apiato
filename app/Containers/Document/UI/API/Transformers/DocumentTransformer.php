<?php

namespace App\Containers\Document\UI\API\Transformers;

use App\Containers\Document\Models\Document;
use App\Ship\Parents\Transformers\Transformer;

class DocumentTransformer extends Transformer
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
     * @param Document $entity
     *
     * @return array
     */
    public function transform(Document $entity)
    {
        $response = [
            'object' => 'Document',
            'id' => $entity->getHashedKey(),
            'project_id' => $entity->project_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'media' => $entity->media,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
