<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class GetAllChecklistsAction extends Action
{
    public function run(DataTransporter $data)
    {
        $params = $data->sanitizeInput([
            "parent_id",
        ]);
        $checklists = Apiato::call('Checklist@GetAllChecklistsTask', [$params], ['addRequestCriteria']);

        return $checklists;
    }
}
