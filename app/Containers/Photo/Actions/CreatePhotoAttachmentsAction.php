<?php

namespace App\Containers\Photo\Actions;

use App\Containers\Photo\UI\API\Requests\CreatePhotoAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreatePhotoAttachmentsAction extends Action
{
    public function run(CreatePhotoAttachmentsRequest $request)
    {
        $files = $request->file();

        if($files)
        {
            $files = Apiato::call('Photo@UpdatePhotoAttachmentsTask', [$request->id, $files]);
        }

        return $files;
    }
}
