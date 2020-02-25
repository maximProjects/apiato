<?php

namespace App\Containers\Task\Actions;

use App\Containers\Task\UI\API\Requests\GetTaskAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTaskAttachmentsAction extends Action
{
    public function run(GetTaskAttachmentsRequest $request)
    {

        $media = Apiato::call('Task@GetTaskAttachmentsTask', [$request->id]);

        return $media;
    }
}
