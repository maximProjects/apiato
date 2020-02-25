<?php

namespace App\Containers\Statistic\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllStatisticsAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "date_start",
            "date_end",
        ]);

        $statistics = Apiato::call('Statistic@GetAllStatisticsTask', [$params], ['addRequestCriteria']);

        return $statistics;
    }
}
