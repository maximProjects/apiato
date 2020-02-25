<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindResourcePlanByIdAction extends Action
{
    public function run(Request $request)
    {
        $resourceplan = Apiato::call('ResourcePlan@FindResourcePlanByIdTask', [$request->id]);

        return $resourceplan;
    }
}
