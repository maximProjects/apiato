<?php

namespace App\Containers\Task\UI\API\Transformers;


use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Media\Models\Media;
use App\Containers\Media\Models\MediaType;
use App\Containers\Task\Models\Task;
use App\Containers\Task\Models\TaskUserType;
use App\Ship\Parents\Transformers\Transformer;
use Cartalyst\Collections\Collection;

class TaskTransformer extends Transformer
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
        'comments'
    ];

    /**
     * @param Task $entity
     *
     * @return array
     */
    public function transform(Task $entity)
    {
        $response = [
            'object' => 'Task',
            'id' => $entity->getHashedKey(),
            'state_id' => (int)$entity->state_id,
            'status' => $entity->status,
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'user_id' => $entity->user_id,
            'price_per_hour_extra' => $entity->price_per_hour_extra,
            'price_per_hour' => $entity->price_per_hour,
            'budget_planned' => $entity->budget_planned,
            'date_end' => $entity->date_end,
            'date_start' => $entity->date_start,
            'description' => $entity->description,
            'tenant_id' => $entity->tenant_id,
            'timer' => $entity->timer,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'comments' => $entity->comments,
            'job_types' => $this->getJobTypes($entity),
            'checklists' => $entity->checklists()->get(),
            'responsible_person' => $entity->user()->where('type', '=', TaskUserType::Responsible)->get(),
            'contact_person' => $entity->user()->where('type', '=', TaskUserType::Contact)->get(),
            'attachments' => new \Illuminate\Support\Collection($entity->media()->wherePivot('type_id', '=', MediaType::Attachment)->get()),
            'photos' => $entity->media()->wherePivot('type_id', '=', MediaType::Photo)->get(),
            'documents' => $entity->media()->wherePivot('type_id', '=', MediaType::Document)->get(),
            'videos' => $entity->media()->wherePivot('type_id', '=', MediaType::Video)->get(),
            'priority' => $entity->priority,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function getJobTypes(Task $entity)
    {
        $result = [];
        $jobTypes = $entity->jobTypes()->get()->toArray();
        foreach($jobTypes as $key => $jt) {
            $pivot = $jobTypes[$key]['pivot'];
            unset($jobTypes[$key]['pivot']);
            $jobTypes[$key] = array_merge($jobTypes[$key], $pivot);
        }
        return $jobTypes;
    }

    public function includeComments(Task $entity)
    {

        return $this->collection($entity->comments, new CommentTransformer());
    }
}
