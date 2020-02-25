<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class AddTaskChecklistAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $task = Apiato::call('Task@AddTaskChecklistTask', [$data]);

        return $task;
    }
}
