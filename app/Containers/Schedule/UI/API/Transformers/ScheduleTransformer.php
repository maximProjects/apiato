<?php

namespace App\Containers\Schedule\UI\API\Transformers;

use App\Containers\Schedule\Models\Schedule;
use App\Ship\Parents\Transformers\Transformer;

class ScheduleTransformer extends Transformer
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
     * @param Schedule $entity
     *
     * @return array
     */
    public function transform(Schedule $entity)
    {
        $response = [
            'object' => 'Schedule',
            'hours' => $entity->hours,
            'duration' => $entity->duration,
            'id' => $entity->getHashedKey(),
            'related_object' => $entity->scheduleable,
            'user' => $entity->user,
            'date_start' => $entity->date_start,
            'date_end' => $entity->date_end,
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
