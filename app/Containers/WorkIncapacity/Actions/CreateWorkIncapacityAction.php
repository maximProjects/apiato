<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateWorkIncapacityAction extends Action
{
    public function run(array $data): WorkIncapacity
    {
        $workincapacity = Apiato::call('WorkIncapacity@CreateWorkIncapacityTask', [$data]);

        return $workincapacity;
    }
}
