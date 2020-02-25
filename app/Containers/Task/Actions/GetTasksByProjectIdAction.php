<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTasksByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $task = Apiato::call('Task@GetTasksByProjectIdTask', [$request->id]);

        return $task;
    }
}
