<?php

namespace App\Containers\Project\UI\API\Transformers;

use App\Containers\Project\Models\Project;
use App\Containers\User\Models\UserType;
use App\Ship\Parents\Transformers\Transformer;

class ProjectTransformer extends Transformer
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
     * @param Project $entity
     *
     * @return array
     */
    public function transform(Project $entity)
    {
        $response = [
            'object' => 'Project',
            'id' => $entity->getHashedKey(),
            'schedules' => $entity->schedules,
            'reference' => $entity->reference,
            'name' => $entity->name,
            'state_id' => (int)$entity->state_id,
            'status' => $entity->status,
            'building_number' => $entity->building_number,
            'property_number' => $entity->property_number,
            'gnr' => $entity->gnr,
            'bnr' => $entity->bnr,
            'fnr' => $entity->fnr,
            'section' => $entity->section,
            'property_owner' => $entity->property_owner,
            'property_owner_phone' => $entity->property_owner_phone,
            'property_owner_information' => $entity->property_owner_information,
            'property_developer' => $entity->property_developer,
            //Work related fields
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
            'working_hours_from' => $entity->working_hours_from,
            'working_hours_to' => $entity->working_hours_to,
            'price_per_hour' => $entity->price_per_hour,
            'price_per_hour_extra' => $entity->price_per_hour_extra,
            'working_hours_planned' => $entity->working_hours_planned,
            'budget_planned' => $entity->budget_planned,
            'exclude_from_balance' => $entity->exclude_from_balance,
            'has_building_application_form' => $entity->has_building_application_form,
            'has_work_safety_plan' => $entity->has_work_safety_plan,
            'is_large_scale_project' => $entity->is_large_scale_project,
            'color_marker' => $entity->color_marker,
            'additional_information' => $entity->additional_information,
            'description' => $entity->description,

            'clients' => $entity->users()->where('type', '=', UserType::UserTypeClient)->get(),
            'managers' => $entity->users()->where('type', '=', UserType::UserTypeManager)->get(),
            'addresses' => $entity->addresses,
            'media' => $entity->media,

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
