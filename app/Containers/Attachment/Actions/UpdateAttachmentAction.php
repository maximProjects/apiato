<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAttachmentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $attachment = Apiato::call('Attachment@UpdateAttachmentTask', [$request->id, $data]);

        return $attachment;
    }
}
