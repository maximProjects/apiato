<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateTaskCommentAction extends Action
{
    public function run(DataTransporter $data)
    {
           $data = $data->toArray();

           $comments = Apiato::call('Task@UpdateTaskCommentsTask', [$data['id'], $data]);
           return $comments;
    }
}
