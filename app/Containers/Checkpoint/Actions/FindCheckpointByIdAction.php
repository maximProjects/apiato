<?php

namespace App\Containers\Checkpoint\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCheckpointByIdAction extends Action
{
    public function run(Request $request)
    {
        $checkpoint = Apiato::call('Checkpoint@FindCheckpointByIdTask', [$request->id]);

        return $checkpoint;
    }
}
