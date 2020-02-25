<?php

namespace App\Containers\Project\Observers;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectState;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Containers\Project   $project
     * @return void
     */
    public function created(Project $project)
    {
        if(isset($project->state_id)) {
            $project->setStatus($project->state_id);
        } else {
            $project->setStatus(ProjectState::New);
        }
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Containers\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        if(isset($project->state_id)) {
            $project->setStatus($project->state_id);
        }
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Containers\Project   $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Containers\Project   $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Containers\Project   $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
