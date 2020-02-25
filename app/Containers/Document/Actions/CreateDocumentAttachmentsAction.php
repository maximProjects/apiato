<?php

namespace App\Containers\Document\Actions;

use App\Containers\Document\UI\API\Requests\CreateDocumentAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDocumentAttachmentsAction extends Action
{
    public function run($id, array $files = [])
    {
        if($files)
        {
            $media = Apiato::call('Document@UpdateDocumentAttachmentsTask', [$id, $files]);
        }

        return $media;
    }
}
