<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FinishTimeRegistryAction extends Action
{
    public function run(array $data)
    {

        $timeregistry = Apiato::call('TimeRegistry@FinishTimeRegistryTask', [$data]);

        return $timeregistry;
    }
}
