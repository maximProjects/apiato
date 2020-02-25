<?php

namespace App\Containers\Task\Actions;

use App\Containers\Task\UI\API\Requests\GetTaskCommentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTaskCommentsAction extends Action
{
    public function run(GetTaskCommentsRequest $request)
    {

        $comments = Apiato::call('Task@GetTaskCommentsTask', [$request->id]);

        return $comments;
    }
}
