<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTaskAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $task = Apiato::call('Task@CreateTaskTask', [$data]);

//        if($files)
//        {
//            Apiato::call('Task@UpdateTaskAttachmentsTask', [$task->id, $files]);
//        }

        if(isset($data['comments']) && count($data['comments']) > 0)
        {
            Apiato::call('Task@UpdateTaskCommentsTask', [$task->id, $data['comments']]);
        }

        return $task;
    }
}
