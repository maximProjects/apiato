<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetWorkIncapacitiesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $workincapacity = Apiato::call('WorkIncapacity@GetWorkIncapacitiesByProjectIdTask', [$request->id]);

        return $workincapacity;
    }
}
