<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class ChecklistsUpdateTreeAction extends Action
{
    public function run(array $data)
    {
        $checklist = Apiato::call('Checklist@ChecklistsUpdateTreeTask', [$data]);

        return $checklist;
    }
}
