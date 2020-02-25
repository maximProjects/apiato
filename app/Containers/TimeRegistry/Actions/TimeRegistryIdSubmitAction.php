<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class TimeRegistryIdSubmitAction extends Action
{
    public function run(array $data)
    {
        $timeregistry = Apiato::call('TimeRegistry@TimeRegistryIdSubmitTask', [$data]);

        return $timeregistry;
    }
}
