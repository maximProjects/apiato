<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetResourcePlanAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "project_id",
            "date",
        ]);
        $schedule = Apiato::call('Schedule@GetResourcePlanTask', [$params], ['addRequestCriteria']);

        return $schedule;
    }
}
