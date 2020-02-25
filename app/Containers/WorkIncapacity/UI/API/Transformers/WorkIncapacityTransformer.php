<?php

namespace App\Containers\WorkIncapacity\UI\API\Transformers;

use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Parents\Transformers\Transformer;

class WorkIncapacityTransformer extends Transformer
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
     * @param WorkIncapacity $entity
     *
     * @return array
     */
    public function transform(WorkIncapacity $entity)
    {
        $response = [
            'object' => 'WorkIncapacity',
            'id' => $entity->getHashedKey(),
            'user' => $entity->user,
            'type_id' => (int)$entity->type_id,
            'state_id' => (int)$entity->state_id,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'comment' => $entity->comment,
            'status' => $entity->status,
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
