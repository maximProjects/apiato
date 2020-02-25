<?php

namespace App\Containers\Media\UI\API\Transformers;

use App\Containers\Media\Models\Media;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Facades\Storage;

class MediaTransformer extends Transformer
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
     * @param Media $entity
     *
     * @return array
     */
    public function transform(Media $entity)
    {
        $response = [
            'object' => 'Media',
            'id' => $entity->getHashedKey(),
            'file' => $entity->file,
            'file_name' => $entity->file_name,
            'url' => Storage::url($entity->file_name),
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
