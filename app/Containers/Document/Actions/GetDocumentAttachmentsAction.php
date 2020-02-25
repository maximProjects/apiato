<?php

namespace App\Containers\Document\Actions;

use App\Containers\Document\UI\API\Requests\GetDocumentAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDocumentAttachmentsAction extends Action
{
    public function run(GetDocumentAttachmentsRequest $request)
    {
        $media = Apiato::call('Document@GetDocumentAttachmentsTask', [$request->id]);

        return $media;
    }
}
