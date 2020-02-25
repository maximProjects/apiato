<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Containers\Workincapacity\Data\Transporters\WorkincapacityTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateWorkIncapacityAction extends Action
{
    public function run(WorkincapacityTransporter $data)
    {

        $workincapacity = Apiato::call('WorkIncapacity@UpdateWorkIncapacityTask', [$data->id, $data->toArray()]);

        return $workincapacity;
    }
}
