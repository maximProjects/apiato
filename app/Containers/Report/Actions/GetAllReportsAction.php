<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllReportsAction extends Action
{
    public function run(Request $request)
    {

        $type = $request->get('report_type');
        $employee_id = $request->get('employee_id');

        //$reports = Apiato::call('Report@GetAllReportsTask', [], ['addRequestCriteria']);

        return ['type' => $type, 'employee_id' => $employee_id];
    }
}
