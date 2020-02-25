<?php

namespace App\Containers\Checklist\Actions;

use App\Containers\Checklist\Data\Transporters\ChecklistTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateChecklistAction extends Action
{
    public function run(ChecklistTransporter $data)
    {

        $checklist = Apiato::call('Checklist@UpdateChecklistTask', [$data->id, $data->toArray()]);

        return $checklist;
    }
}
