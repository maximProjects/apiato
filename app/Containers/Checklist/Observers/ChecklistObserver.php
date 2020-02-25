<?php

namespace App\Containers\Checklist\Observers;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Models\ChecklistState;

class ChecklistObserver
{
    /**
     * Handle the checklist "created" event.
     *
     * @param  \App\Containers\Checklist  $checklist
     * @return void
     */
    public function created(Checklist $checklist)
    {
        if(isset($checklist->state_id)) {
            $checklist->setStatus($checklist->state_id);
        } else {
            $checklist->setStatus(ChecklistState::New);
        }
    }

    /**
     * Handle the checklist "updated" event.
     *
     * @param  \App\Containers\Checklist  $checklist
     * @return void
     */
    public function updated(Checklist $checklist)
    {
        if(isset($checklist->state_id)) {
            $checklist->setStatus($checklist->state_id);
        }
    }

    /**
     * Handle the checklist "deleted" event.
     *
     * @param  \App\Containers\Checklist  $checklist
     * @return void
     */
    public function deleted(Checklist $checklist)
    {
        //
    }

    /**
     * Handle the checklist "restored" event.
     *
     * @param  \App\Containers\Checklist  $checklist
     * @return void
     */
    public function restored(Checklist $checklist)
    {
        //
    }

    /**
     * Handle the checklist "force deleted" event.
     *
     * @param  \App\Containers\Checklist  $checklist
     * @return void
     */
    public function forceDeleted(Checklist $checklist)
    {
        //
    }
}
