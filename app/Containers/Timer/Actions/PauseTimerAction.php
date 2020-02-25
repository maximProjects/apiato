<?php

namespace App\Containers\Timer\Actions;

use App\Containers\Timer\Data\Transporters\CreateTimerTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class PauseTimerAction extends Action
{
  public function run(CreateTimerTransporter $data)
  {
     $timer = Apiato::call('Timer@PauseTimerTask', [$data->toArray()]);

    return $timer;
  }
}
