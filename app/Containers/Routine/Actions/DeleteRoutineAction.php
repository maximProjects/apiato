<?php

namespace App\Containers\Routine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteRoutineAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Routine@DeleteRoutineTask', [$request->id]);
    }
}
