<?php

namespace App\Containers\Job\Actions;

use App\Containers\Job\UI\API\Requests\CreateJobAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateJobAttachmentsAction extends Action
{
    public function run(CreateJobAttachmentsRequest $request)
    {
        $files = $request->file();

        if($files)
        {
            $files = Apiato::call('Job@UpdateJobAttachmentsTask', [$request->id, $files]);
        }

        return $files;
    }
}
