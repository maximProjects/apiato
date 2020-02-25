<?php

namespace App\Containers\Checkpoint\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCheckpointsAction extends Action
{
    public function run(Request $request)
    {

        $checkpoints = Apiato::call('Checkpoint@GetAllCheckpointsTask', [], ['addRequestCriteria']);

        return $checkpoints;
    }
}
