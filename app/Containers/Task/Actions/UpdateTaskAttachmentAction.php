<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateTaskAttachmentAction extends Action
{
    public function run($id, array $files = [])
    {
        $task = Apiato::call('Task@FindTaskByIdTask', [$id]);

           $media = Apiato::call('Task@UpdateTaskAttachmentsTask', [$task->id, $files]);


        return $media;
    }
}
