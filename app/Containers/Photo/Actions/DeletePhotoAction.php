<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeletePhotoAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Photo@DeletePhotoTask', [$request->id]);
    }
}
