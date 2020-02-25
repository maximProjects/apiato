<?php

namespace App\Containers\ResourcePlan\UI\API\Transformers;

use App\Containers\ResourcePlan\Models\ResourcePlan;
use App\Ship\Parents\Transformers\Transformer;

class ResourcePlanTransformer extends Transformer
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
     * @param ResourcePlan $entity
     *
     * @return array
     */
    public function transform(ResourcePlan $entity)
    {
        $response = [
            'object' => 'ReosurcePlan',
            'id' => $entity->getHashedKey(),
            'project_id' => $entity->project_id,
            'number_employees_required' => $entity->number_employees_required,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            "schedule_assigned_users" => $entity->getAssignedUsers(),
            "unavailable" => $entity->getUnavailable(),
            "workIncapacity" => $entity->getWorkIncapacity(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
