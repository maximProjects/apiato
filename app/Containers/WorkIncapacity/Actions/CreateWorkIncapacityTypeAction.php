<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Containers\WorkIncapacity\Models\WorkIncapacityType;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateWorkIncapacityTypeAction extends Action
{
    public function run(DataTransporter $data): WorkIncapacityType
    {

        $data = $data->sanitizeInput([
            'name' => $data->name,
        ]);
        $workincapacitytype = Apiato::call('WorkIncapacity@CreateWorkIncapacityTypeTask', [$data]);

        return $workincapacitytype;
    }
}
