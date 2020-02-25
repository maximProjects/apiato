<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindReportTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $reporttype = Apiato::call('Report@FindReportTypeByIdTask', [$request->id]);

        return $reporttype;
    }
}
