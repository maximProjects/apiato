<?php

namespace App\Containers\Job\UI\API\Transformers;

use App\Containers\Job\Models\Job;
use App\Containers\Media\Models\MediaType;
use App\Ship\Parents\Transformers\Transformer;

class JobTransformer extends Transformer
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
     * @param Job $entity
     *
     * @return array
     */
    public function transform(Job $entity)
    {
        $response = [
            'object' => 'Job',
            'id' => $entity->getHashedKey(),
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'task' => $entity->task,
            'extra_time' => $entity->extra_time,
            'timeRegistry' => $entity->timeRegistry,
            'job_type' => $entity->jobType,
            'description' => $entity->description,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'tags' => $entity->tags,
            'hourly_rate' => $entity->hourly_rate,
            'duration' => $entity->sendDuration(),
            'fixed_amount' => $entity->fixed_amount,
            'attachments' => $entity->media()->wherePivot('type_id', '=', MediaType::Attachment)->get(),
            'photos' => $entity->media()->wherePivot('type_id', '=', MediaType::Photo)->get(),
            'documents' => $entity->media()->wherePivot('type_id', '=', MediaType::Document)->get(),
            'videos' => $entity->media()->wherePivot('type_id', '=', MediaType::Video)->get(),
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
