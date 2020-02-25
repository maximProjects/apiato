<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Containers\TimeRegistry\UI\API\Requests\FindTimeRegistryByIdRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTimeRegistryAttachmentsAction extends Action
{
    public function run(FindTimeRegistryByIdRequest $request)
    {
        $media = Apiato::call('TimeRegistry@GetTimeRegistryAttachmentsTask', [$request->id]);

        return $media;
    }
}
