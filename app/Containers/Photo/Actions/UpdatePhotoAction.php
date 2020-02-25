<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdatePhotoAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $photo = Apiato::call('Photo@UpdatePhotoTask', [$request->id, $data]);

        return $photo;
    }
}
