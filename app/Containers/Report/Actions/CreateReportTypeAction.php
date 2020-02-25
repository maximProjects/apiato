<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateReportTypeAction extends Action
{
    public function run(DataTransporter $data)
    {
        $data = $data->sanitizeInput([
            // add your request data here
        ]);

        $reporttype = Apiato::call('Report@CreateReportTypeTask', [[app()->getLocale() => $data]]);

        return $reporttype;
    }
}
