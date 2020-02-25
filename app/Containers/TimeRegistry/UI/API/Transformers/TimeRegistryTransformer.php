<?php

namespace App\Containers\TimeRegistry\UI\API\Transformers;

use App\Containers\Media\Models\MediaType;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Parents\Transformers\Transformer;

class TimeRegistryTransformer extends Transformer
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
     * @param TimeRegistry $entity
     *
     * @return array
     */
    public function transform(TimeRegistry $entity)
    {
        $response = [
            'object' => 'TimeRegistry',
            'id' => $entity->getHashedKey(),
            'type_id' => (int)$entity->type_id,
            'state_id' => (int)$entity->state_id,
            'user' => $entity->user,
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'jobs' => $entity->jobs,
            'report' => $entity->report(),
            'attachments' => new \Illuminate\Support\Collection($entity->media()->wherePivot('type_id', '=', MediaType::Attachment)->get()),
            'photos' => $entity->media()->wherePivot('type_id', '=', MediaType::Photo)->get(),
            'documents' => $entity->media()->wherePivot('type_id', '=', MediaType::Document)->get(),
            'videos' => $entity->media()->wherePivot('type_id', '=', MediaType::Video)->get(),
            'description' => $entity->description,
            'comments' => $entity->comments()->get(),
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'timer' => $entity->timer,
            'tasks' => $entity->tasks(),
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
