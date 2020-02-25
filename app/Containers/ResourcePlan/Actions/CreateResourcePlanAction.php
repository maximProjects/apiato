<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateResourcePlanAction extends Action
{
    public function run(array $data)
    {

        $resourceplan = Apiato::call('ResourcePlan@CreateResourcePlanTask', [$data]);

        return $resourceplan;
    }
}
