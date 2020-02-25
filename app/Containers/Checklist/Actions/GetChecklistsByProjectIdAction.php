<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetChecklistsByProjectIdAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "id",
            "parent_id"
        ]);
        $checklist = Apiato::call('Checklist@GetChecklistsByProjectIdTask', [$params], ['addRequestCriteria']);

        return $checklist;
    }
}
