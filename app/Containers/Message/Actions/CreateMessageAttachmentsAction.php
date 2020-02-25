<?php

namespace App\Containers\Message\Actions;

use App\Containers\Message\UI\API\Requests\CreateMessageAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMessageAttachmentsAction extends Action
{
    public function run($id, array $files = [])
    {
        $media = Apiato::call('Message@UpdateMessageAttachmentsTask', [$id, $files]);

        return $media;
    }
}
