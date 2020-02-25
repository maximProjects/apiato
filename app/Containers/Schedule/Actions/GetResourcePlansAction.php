<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetResourcePlansAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "date_start",
            "date_end",
        ]);
        $schedule = Apiato::call('Schedule@GetResourcePlansTask', [$params], ['addRequestCriteria']);

        return $schedule;
    }
}
