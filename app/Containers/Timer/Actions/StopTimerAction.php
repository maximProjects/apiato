<?php

namespace App\Containers\Timer\Actions;

use App\Containers\Timer\Data\Transporters\CreateTimerTransporter;
use App\Containers\Timer\UI\API\Requests\CreateTimerRequest;
use App\Containers\Timer\UI\API\Requests\UpdateTimerRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class StopTimerAction extends Action
{
    public function run(CreateTimerTransporter $data)
    {

        $timer = Apiato::call('Timer@StopTimerTask', [$data->toArray()]);

        return $timer;
    }
}
