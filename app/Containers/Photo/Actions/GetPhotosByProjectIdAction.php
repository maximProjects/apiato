<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetPhotosByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $photo = Apiato::call('Photo@GetPhotosByProjectIdTask', [$request->id]);

        return $photo;
    }
}
