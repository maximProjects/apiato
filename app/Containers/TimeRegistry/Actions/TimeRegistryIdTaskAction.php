<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class TimeRegistryIdTaskAction extends Action
{
    public function run(array $data)
    {
        $timeregistry = Apiato::call('TimeRegistry@TimeRegistryIdTaskTask', [$data]);

        return $timeregistry;
    }
}
