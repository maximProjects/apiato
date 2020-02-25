<?php

namespace App\Containers\Task\Actions;

use App\Containers\Task\UI\API\Requests\CreateTaskAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTaskAttachmentsAction extends Action
{
    public function run(CreateTaskAttachmentsRequest $request)
    {
        $files = $request->file();

        if($files)
        {
            $files = Apiato::call('Task@UpdateTaskAttachmentsTask', [$request->id, $files]);
        }

        return $files;
    }
}
