<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllJobTypesAction extends Action
{
    public function run(DataTransporter $data)
    {

        $params = $data->sanitizeInput([
            "state_id",
        ]);
        $jobtypes = Apiato::call('Job@GetAllJobTypesTask', [$params], ['addRequestCriteria']);

        return $jobtypes;
    }
}
