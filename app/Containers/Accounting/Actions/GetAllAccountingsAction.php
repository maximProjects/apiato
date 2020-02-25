<?php

namespace App\Containers\Accounting\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllAccountingsAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "project_id",
            "project_group_id",
            "date_start",
            "date_end",
        ]);
        $accountings = Apiato::call('Accounting@GetAllAccountingsTask', [$params], ['addRequestCriteria']);

        return $accountings;
    }
}
