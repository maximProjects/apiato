<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class ChecklistsTreeAction extends Action
{
    public function run(array $data)
    {
        $checklist = Apiato::call('Checklist@ChecklistsTreeTask', [$data]);

        return $checklist;
    }
}
