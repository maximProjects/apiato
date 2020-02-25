<?php

namespace App\Containers\Project\UI\API\Transformers;

use App\Containers\Project\Models\ProjectGroup;
use App\Ship\Parents\Transformers\Transformer;

class ProjectGroupTransformer extends Transformer
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
     * @param ProjectGroup $entity
     *
     * @return array
     */
    public function transform(ProjectGroup $entity)
    {
        $response = [
            'object' => 'ProjectGroup',
            'id' => $entity->getHashedKey(),
            'schedules' => $entity->schedules,
            'project_id' => $entity->project_id,
            'state_id' => (int)$entity->state_id,
            'reference' => $entity->reference,
            'code' => $entity->code,
            'name' => $entity->name,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'working_hours_planned' => $entity->working_hours_planned,
            'budget_planned' => $entity->budget_planned,
            'number_employees_required' => $entity->number_employees_required,
            'description' => $entity->description,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'deleted_at' => $entity->deleted_at,
            'report' => $entity->report(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
