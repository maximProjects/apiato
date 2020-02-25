<?php

namespace App\Containers\Routine\UI\API\Transformers;

use App\Containers\Routine\Models\Routine;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Facades\App;

class RoutineTransformer extends Transformer
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
     * @param Routine $entity
     *
     * @return array
     */
    public function transform(Routine $entity)
    {
        $loc = App::getLocale();
        $response = [
            'object' => 'Routine',
            'id' => $entity->getHashedKey(),
            'name' => $entity->name ? $entity->translate($loc)->name : $entity->name,
            'description' => $entity->description ? $entity->translate($loc)->description : $entity->description,
            'project_id' => $entity->project_id,
            'projectGroup' => $entity->projectGroup,
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
