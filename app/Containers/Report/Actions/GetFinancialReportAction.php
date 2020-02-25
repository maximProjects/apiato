<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetFinancialReportAction extends Action
{
    public function run(DataTransporter $data)
    {
        $report = Apiato::call('Report@GetFinancialReportTask', [$data->toArray()], ['addRequestCriteria']);

        return $report;
    }
}
