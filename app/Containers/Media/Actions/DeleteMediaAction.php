<?php

namespace App\Containers\Media\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteMediaAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Media@DeleteMediaTask', [$request->id]);
    }
}
