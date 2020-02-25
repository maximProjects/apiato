<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllWorkIncapacitiesAction extends Action
{
    public function run(Request $request)
    {
        $workIncapacities = Apiato::call('WorkIncapacity@GetAllWorkIncapacitiesTask', [], ['addRequestCriteria']);

        return $workIncapacities;
    }
}
