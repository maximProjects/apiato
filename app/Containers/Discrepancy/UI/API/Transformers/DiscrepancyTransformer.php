<?php

namespace App\Containers\Discrepancy\UI\API\Transformers;

use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Discrepancy\Models\DiscrepancyUserType;
use App\Containers\Media\Models\MediaType;
use App\Ship\Parents\Transformers\Transformer;

class DiscrepancyTransformer extends Transformer
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
     * @param Discrepancy $entity
     *
     * @return array
     */
    public function transform(Discrepancy $entity)
    {
        $response = [
            'object' => 'Discrepancy',
            'id' => $entity->getHashedKey(),
            'suggested_actions' => $entity->suggested_actions,
            'path' => $entity->path,
            'location' => $entity->location,
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'price_per_hour_extra' => $entity->price_per_hour_extra,
            'price_per_hour' => $entity->price_per_hour,
            'budget_planned' => $entity->budget_planned,
            'date_end' => $entity->date_end,
            'date_start' => $entity->date_start,
            'description' => $entity->description,
            'state_id' => (int)$entity->state_id,
            'type_id' => (int)$entity->type_id,
            'tenant_id' => $entity->tenant_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'assigned_to' => $entity->users()->where('type', '=', DiscrepancyUserType::AssignedTo)->get(),
            'created_by' => $entity->users()->where('type', '=', DiscrepancyUserType::CreatedBy)->get(),
            'attachments' => $entity->media()->wherePivot('type_id', '=', MediaType::Attachment)->get(),
            'comments' => $entity->comments,
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
