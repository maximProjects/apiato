<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAttachmentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Attachment@DeleteAttachmentTask', [$request->id]);
    }
}
