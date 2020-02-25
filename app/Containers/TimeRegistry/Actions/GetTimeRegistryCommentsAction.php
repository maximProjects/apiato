<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Containers\TimeRegistry\UI\API\Requests\FindTimeRegistryByIdRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTimeRegistryCommentsAction extends Action
{
    public function run(FindTimeRegistryByIdRequest $request)
    {
        $comments = Apiato::call('TimeRegistry@GetTimeRegistryCommentsTask', [$request->id]);

        return $comments;
    }
}
