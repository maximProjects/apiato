<?php

namespace App\Containers\Attachment\UI\API\Transformers;

use App\Containers\Attachment\Models\Attachment;
use App\Ship\Parents\Transformers\Transformer;

class AttachmentTransformer extends Transformer
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
     * @param Attachment $entity
     *
     * @return array
     */
    public function transform(Attachment $entity)
    {
        $response = [
            'object' => 'Attachment',
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
