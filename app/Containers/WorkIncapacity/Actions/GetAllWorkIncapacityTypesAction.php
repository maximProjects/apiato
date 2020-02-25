<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllWorkIncapacityTypesAction extends Action
{
    public function run(Request $request)
    {
        $workincapacitytypes = Apiato::call('WorkIncapacity@GetAllWorkIncapacityTypesTask', [], ['addRequestCriteria']);

        return $workincapacitytypes;
    }
}
