<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateReportTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $reporttype = Apiato::call('ReportType@UpdateReportTypeTask', [$request->id, $data]);

        return $reporttype;
    }
}
