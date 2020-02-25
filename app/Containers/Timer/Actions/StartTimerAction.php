<?php

namespace App\Containers\Timer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class StartTimerAction extends Action
{
    public function run(array $data)
    {

        $timer = Apiato::call('Timer@StartTimerTask', [$data]);
        return $timer;
    }
}
