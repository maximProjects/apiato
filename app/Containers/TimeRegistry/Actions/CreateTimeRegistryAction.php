<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateTimeRegistryAction extends Action
{
    public function run(array $data)
    {

        $timeregistry = Apiato::call('TimeRegistry@CreateTimeRegistryTask', [$data]);

        return $timeregistry;
    }
}
