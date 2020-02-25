<?php

namespace App\Containers\Job\Actions;

use App\Containers\Job\UI\API\Requests\GetJobAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetJobAttachmentsAction extends Action
{
    public function run(GetJobAttachmentsRequest $request)
    {
        $media = Apiato::call('Job@GetJobAttachmentsTask', [$request->id]);

        return $media;
    }
}
