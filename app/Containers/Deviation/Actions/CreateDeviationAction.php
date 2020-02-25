<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateDeviationAction extends Action
{
    public function run(array $data)
    {

        $deviation = Apiato::call('Deviation@CreateDeviationTask', [$data]);

        return $deviation;
    }
}
