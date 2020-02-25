<?php

namespace App\Containers\Checkpoint\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateCheckpointAction extends Action
{
    public function run(array $data)
    {

        $checkpoint = Apiato::call('Checkpoint@CreateCheckpointTask', [$data]);

        return $checkpoint;
    }
}
