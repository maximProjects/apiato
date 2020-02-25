<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllProjectsAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "limit",
            "page",
            "date_start",
            "date_end",
            "state_id",
            "order_by_name",
            "client_id",
        ]);

        $projects = Apiato::call('Project@GetAllProjectsTask', [$params], ['addRequestCriteria']);

        return $projects;
    }
}
