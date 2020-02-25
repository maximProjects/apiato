<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAttachmentByIdAction extends Action
{
    public function run(Request $request)
    {
        $attachment = Apiato::call('Attachment@FindAttachmentByIdTask', [$request->id]);

        return $attachment;
    }
}
