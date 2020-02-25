<?php

namespace App\Containers\Attachment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Session\Store;

class CreateAttachmentAction extends Action
{
    //Todo: Create Attachment from existing Media or create new Media
    public function run(Request $request)
    {
        ////$data = $request->file('new_attachment')->store('nwo', 's3');
        //$data = $request->file();
        //
        //
        //$attachments = Apiato::call('Attachment@UploadAttachmentTask', [$data]);
        //dump($attachments);
        //exit;
        //$attachments = Apiato::call('Attachment@CreateAttachmentTask', [$attachments]);
        //
        //return $attachments;
    }
}
