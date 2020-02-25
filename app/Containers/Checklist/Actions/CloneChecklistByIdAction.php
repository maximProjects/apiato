<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Symfony\Component\VarDumper\Cloner\Data;

class CloneChecklistByIdAction extends Action
{
    public function run(DataTransporter $data)
    {

        $checklist = Apiato::call('Checklist@CloneChecklistByIdTask', [$data->id]);

        return $checklist;
    }
}
