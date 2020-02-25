<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllResourcePlansAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "date_start",
            "date_end",
            "project_id",
        ]);

        $resourceplans = Apiato::call('ResourcePlan@GetAllResourcePlansTask', [$params], ['addRequestCriteria']);

        return $resourceplans;
    }
}
