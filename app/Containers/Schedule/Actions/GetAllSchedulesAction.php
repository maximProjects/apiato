<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllSchedulesAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "date_start",
            "date_end",
            "project_id",
            "project_group_id",
        ]);
        $schedules = Apiato::call('Schedule@GetAllSchedulesTask', [$params], ['addRequestCriteria']);

        return $schedules;
    }
}
