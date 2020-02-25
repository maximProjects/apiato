<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateDeviationAction extends Action
{
    public function run(DataTransporter $data)
    {

        $deviation = Apiato::call('Deviation@UpdateDeviationTask', [$data->id, $data->toArray()]);

        return $deviation;
    }
}
