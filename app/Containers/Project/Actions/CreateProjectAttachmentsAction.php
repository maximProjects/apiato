<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateProjectAttachmentsAction extends Action
{
    public function run(Request $request)
    {
        $files = $request->file();

        if($files)
        {
            $files = Apiato::call('Project@UpdateProjectAttachmentsTask', [$request->id, $files]);
        }

        return $files;
    }
}
