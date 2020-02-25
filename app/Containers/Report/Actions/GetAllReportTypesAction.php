<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllReportTypesAction extends Action
{
    public function run(Request $request)
    {
        $reporttypes = Apiato::call('Report@GetAllReportTypesTask', [], ['addRequestCriteria']);

        return $reporttypes;
    }
}
