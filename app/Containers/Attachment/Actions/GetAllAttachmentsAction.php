<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAttachmentsAction extends Action
{
    public function run(Request $request)
    {
        $attachments = Apiato::call('Attachment@GetAllAttachmentsTask', [], ['addRequestCriteria']);

        return $attachments;
    }
}
