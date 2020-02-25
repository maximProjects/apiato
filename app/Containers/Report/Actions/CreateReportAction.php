<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateReportAction extends Action
{
    public function run(DataTransporter $data)
    {
        $data = $data->sanitizeInput([
            // add your request data here
        ]);

        $report = Apiato::call('Report@CreateReportTask', [$data]);

        return $report;
    }
}
