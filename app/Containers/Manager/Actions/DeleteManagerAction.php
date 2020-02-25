<?php

namespace App\Containers\Manager\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteManagerAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Manager@DeleteManagerTask', [$request->id]);
    }
}
