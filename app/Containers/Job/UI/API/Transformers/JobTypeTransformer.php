<?php

namespace App\Containers\Job\UI\API\Transformers;

use App\Containers\Job\Models\JobType;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Facades\App;

class JobTypeTransformer extends Transformer
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
     * @param JobType $entity
     *
     * @return array
     */
    public function transform(JobType $entity)
    {
        $loc = App::getLocale();
        $response = [
            'object' => 'JobType',
            'id' => $entity->getHashedKey(),
            'type_id' => (int)$entity->type_id,
            'state_id' => (int)$entity->state_id,
            'user_id' => $entity->user,
            'name' => $entity->name,
            'description' => $entity->description,
            'planned_hours' => number_format($entity->planned_hours, 2),
            'planned_quantity' => number_format($entity->planned_quantity, 2),
            'project_group_id' => $entity->project_group_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'checklist' => $entity->checklist,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
