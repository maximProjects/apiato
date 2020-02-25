<?php

namespace App\Containers\Task\Observers;

use App\Containers\Task\Models\Task;
use App\Containers\Task\Models\TaskState;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Containers\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        if(isset($task->state_id)) {
            $task->setStatus($task->state_id);
        } else {
            $task->setStatus(TaskState::New);
        }
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Containers\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        if(isset($task->state_id)) {
            $task->setStatus($task->state_id);
        }
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Containers\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        //
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Containers\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Containers\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }
}
