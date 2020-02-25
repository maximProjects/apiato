<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class ChecklistsByJobTypeIdAction extends Action
{
    public function run(array $data)
    {
        $checklist = Apiato::call('Checklist@ChecklistsByJobTypeIdTask', [$data['id'], $data]);

        return $checklist;
    }
}
