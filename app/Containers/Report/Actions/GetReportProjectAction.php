<?php

namespace App\Containers\Report\Actions;

use App\Containers\Report\UI\API\Requests\GetReportProjectRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetReportProjectAction extends Action
{
    public function run(DataTransporter $data)
    {

        $report = Apiato::call('Report@GetReportProjectTask', [$data->toArray()], ['addRequestCriteria']);

        return $report;
    }
}
