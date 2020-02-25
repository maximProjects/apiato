<?php

namespace App\Containers\Checkpoint\Observers;

use App\Containers\Checkpoint\Models\Checkpoint;
use App\Containers\Checkpoint\Models\CheckpointState;

class CheckpointObserver
{
    /**
     * Handle the checkpoint "created" event.
     *
     * @param  \App\Containers\Checkpoint  $checkpoint
     * @return void
     */
    public function created(Checkpoint $checkpoint)
    {
        if(isset($checkpoint->state_id)) {
            $checkpoint->setStatus($checkpoint->state_id);
        } else {
            $checkpoint->setStatus(CheckpointState::New);
        }
    }

    /**
     * Handle the checkpoint "updated" event.
     *
     * @param  \App\Containers\Checkpoint  $checkpoint
     * @return void
     */
    public function updated(Checkpoint $checkpoint)
    {
        if(isset($checkpoint->state_id)) {
            $checkpoint->setStatus($checkpoint->state_id);
        }
    }

    /**
     * Handle the checkpoint "deleted" event.
     *
     * @param  \App\Containers\Checkpoint  $checkpoint
     * @return void
     */
    public function deleted(Checkpoint $checkpoint)
    {
        //
    }

    /**
     * Handle the checkpoint "restored" event.
     *
     * @param  \App\Containers\Checkpoint  $checkpoint
     * @return void
     */
    public function restored(Checkpoint $checkpoint)
    {
        //
    }

    /**
     * Handle the checkpoint "force deleted" event.
     *
     * @param  \App\Containers\Checkpoint  $checkpoint
     * @return void
     */
    public function forceDeleted(Checkpoint $checkpoint)
    {
        //
    }
}
