<?php

namespace App\Containers\Routine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindRoutineByIdAction extends Action
{
    public function run(Request $request)
    {
        $routine = Apiato::call('Routine@FindRoutineByIdTask', [$request->id]);

        return $routine;
    }
}
