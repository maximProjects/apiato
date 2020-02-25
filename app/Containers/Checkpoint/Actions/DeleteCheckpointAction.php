<?php

namespace App\Containers\Checkpoint\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCheckpointAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Checkpoint@DeleteCheckpointTask', [$request->id]);
    }
}
