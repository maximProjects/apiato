<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindPhotoByIdAction extends Action
{
    public function run(Request $request)
    {
        $photo = Apiato::call('Photo@FindPhotoByIdTask', [$request->id]);

        return $photo;
    }
}
