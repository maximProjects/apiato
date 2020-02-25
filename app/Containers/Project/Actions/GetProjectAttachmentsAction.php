<?php

namespace App\Containers\Project\Actions;

use App\Containers\Project\UI\API\Requests\GetProjectAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetProjectAttachmentsAction extends Action
{
    public function run(GetProjectAttachmentsRequest $request)
    {
        $media = Apiato::call('Project@GetProjectAttachmentsTask', [$request->id]);

        return $media;
    }
}
