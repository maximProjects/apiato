<?php

namespace App\Containers\Message\Actions;

use App\Containers\Message\UI\API\Requests\GetMessageAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetMessageAttachmentsAction extends Action
{
    public function run(GetMessageAttachmentsRequest $request)
    {
        $media = Apiato::call('Message@GetMessageAttachmentsTask', [$request->id]);

        return $media;
    }
}
