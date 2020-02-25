<?php

namespace App\Containers\Checklist\UI\API\Transformers;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Task\Models\TaskUserType;
use App\Ship\Parents\Transformers\Transformer;
use Illuminate\Support\Facades\App;

class ChecklistTransformer extends Transformer
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
     * @param Checklist $entity
     *
     * @return array
     */
    public function transform(Checklist $entity)
    {
        $loc = App::getLocale();
        $response = [
            'object' => 'Checklist',
            'id' => $entity->getHashedKey(),
            'status' => $entity->status,
            'name' => $entity->name ? $entity->translate($loc)->name : $entity->name,
            'description' => $entity->description ? $entity->translate($loc)->description : $entity->description,
            'is_group' => $entity->is_group,
            'is_template' => $entity->is_template,
            'parent_id' => $entity->parent_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

            'responsible_person' => $entity->user()->where('type', '=', TaskUserType::Responsible)->get(),
            'contact_person' => $entity->user()->where('type', '=', TaskUserType::Contact)->get(),
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'checkpoints' => $entity->checkpoints,
            'media' => $entity->media,
            'children' => $entity->children,
            'percent' => $entity->percent,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
