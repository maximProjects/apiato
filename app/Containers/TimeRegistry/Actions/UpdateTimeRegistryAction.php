<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateTimeRegistryAction extends Action
{
    public function run(TimeRegistryTransporter $data)
    {

        $timeregistry = Apiato::call('TimeRegistry@UpdateTimeRegistryTask', [$data->id, $data->toArray()]);

        return $timeregistry;
    }
}
