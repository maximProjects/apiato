<?php

namespace App\Containers\Message\Actions;

use App\Containers\Message\UI\API\Requests\GetMessageCommentRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetMessageCommentsAction extends Action
{
    public function run(GetMessageCommentRequest $request)
    {
        $comments = Apiato::call('Message@GetMessageCommentsTask', [$request->id]);

        return $comments;
    }
}
