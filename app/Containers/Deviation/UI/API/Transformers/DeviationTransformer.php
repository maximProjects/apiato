<?php

namespace App\Containers\Deviation\UI\API\Transformers;

use App\Containers\Deviation\Models\Deviation;
use App\Ship\Parents\Transformers\Transformer;

class DeviationTransformer extends Transformer
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
     * @param Deviation $entity
     *
     * @return array
     */
    public function transform(Deviation $entity)
    {
        $response = [
            'object' => 'Deviation',
            'id' => $entity->getHashedKey(),
            'type_id' => (int)$entity->type_id,
            'state_id' => (int)$entity->state_id,
            'path' => $entity->path,
            'location' => $entity->location,
            'suggested_actions' => $entity->suggested_actions,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            "description" => $entity->description,
            'project_id' => $entity->project_id,
            'responsible_person' => $entity->user,
            'checkpoint' => $entity->checkpoint,
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
