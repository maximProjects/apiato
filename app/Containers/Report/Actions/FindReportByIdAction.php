<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindReportByIdAction extends Action
{
    public function run(Request $request)
    {
        $report = Apiato::call('Report@FindReportByIdTask', [$request->id]);

        return $report;
    }
}
