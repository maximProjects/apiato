<?php

namespace App\Containers\Checkpoint\Events\Events;

use App\Ship\Parents\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UpdateCheckpointEvent
 */
class UpdateCheckpointEvent extends Event
{
    use SerializesModels;

    /**
     * @var \App\Containers\Checkpoint\Models\Checkpoint
     */
    public $entity;

    /**
     * UpdateCheckpointEvent constructor.
     *
     * @param $entity
     */
    public function __construct($entity)
    {
        $entity->setStatus('createdz');
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
