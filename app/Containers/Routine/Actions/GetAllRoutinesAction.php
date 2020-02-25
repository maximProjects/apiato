<?php

namespace App\Containers\Routine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRoutinesAction extends Action
{
    public function run(Request $request)
    {
        $routines = Apiato::call('Routine@GetAllRoutinesTask', [], ['addRequestCriteria']);

        return $routines;
    }
}
