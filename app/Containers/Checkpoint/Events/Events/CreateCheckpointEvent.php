<?php

namespace App\Containers\Checkpoint\Events\Events;

use App\Ship\Parents\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class CreateCheckpointEvent
 */
class CreateCheckpointEvent extends Event
{
    use SerializesModels;

    /**
     * @var \App\Containers\Checkpoint\Models\Checkpoint
     */
    public $entity;

    /**
     * CreateCheckpointEvent constructor.
     *
     * @param $entity
     */
    public function __construct($entity)
    {
        //$this->entity = $entity;
        $entity->setStatus('created');
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
