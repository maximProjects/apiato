<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteResourcePlanAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('ResourcePlan@DeleteResourcePlanTask', [$request->id]);
    }
}
