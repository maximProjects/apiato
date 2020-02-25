<?php

namespace App\Containers\Checkpoint\UI\API\Transformers;

use App\Containers\Checkpoint\Models\Checkpoint;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Facades\App;

class CheckpointTransformer extends Transformer
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
     * @param Checkpoint $entity
     *
     * @return array
     */
    public function transform(Checkpoint $entity)
    {
        $loc = App::getLocale();
        $response = [
            'object' => 'Checkpoint',
            'id' => $entity->getHashedKey(),
            'checklist_id' => $entity->checklist_id,
            'state_id' => (int)$entity->state_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'status' => $entity->status,
            'name' => $entity->name ? $entity->translate($loc)->name : $entity->name,
            'description' => $entity->description ? $entity->translate($loc)->description : $entity->description,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
