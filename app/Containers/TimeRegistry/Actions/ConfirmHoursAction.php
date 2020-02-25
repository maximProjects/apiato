<?php

namespace App\Containers\TImeRegistry\Actions;

use App\Containers\TimeRegistry\Data\Transporters\ConfirmHoursTransporter;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class ConfirmHoursAction extends Action
{
    public function run(array $data)
    {
        $timeregistry = Apiato::call('TimeRegistry@ConfirmHoursTask', [$data['id'], $data]);

        return $timeregistry;
    }
}
