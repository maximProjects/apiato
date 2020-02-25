<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateChecklistAttachmentsAction extends Action
{
    public function run(Request $request)
    {
        $files = $request->file();

        if($files)
        {
            $files = Apiato::call('Checklist@UpdateChecklistAttachmentsTask', [$request->id, $files]);
        }

        return $files;
    }
}
