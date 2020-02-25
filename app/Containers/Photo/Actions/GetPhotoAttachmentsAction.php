<?php

namespace App\Containers\Photo\Actions;

use App\Containers\Photo\UI\API\Requests\GetPhotoAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetPhotoAttachmentsAction extends Action
{
    public function run(GetPhotoAttachmentsRequest $request)
    {
        die('153');
        $media = Apiato::call('Photo@GetPhotoAttachmentsTask', [$request->id]);

        return $media;
    }
}
