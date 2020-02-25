<?php

namespace App\Containers\Task\Actions;

use App\Containers\Project\Models\Project;
use App\Containers\Task\Data\Transporters\TaskTransporter;
use App\Containers\Task\Models\Task;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateTaskAction extends Action
{
    public function run(TaskTransporter $data): Task
    {

        $task = Apiato::call('Task@UpdateTaskTask', [$data->id, $data->toArray()]);

        return $task;
    }
}
