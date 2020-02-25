<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTaskCommentsAction extends Action
{
    public function run(int $id, array $data)
    {
        $comments = Apiato::call('Task@UpdateTaskCommentsTask', [$id, $data]);
        return $comments;
    }
}
