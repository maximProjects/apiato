<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetResourcePlanByProjectIdAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "id",
            "date",
        ]);
        $resourceplan = Apiato::call('ResourcePlan@GetResourcePlanByProjectIdTask', [$params], ['addRequestCriteria']);

        return $resourceplan;
    }
}
