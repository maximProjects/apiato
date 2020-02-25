<?php

namespace App\Containers\Checkpoint\Actions;

use App\Containers\Checkpoint\Data\Transporters\CheckpointTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateCheckpointAction extends Action
{
    public function run(CheckpointTransporter $data)
    {

        $checkpoint = Apiato::call('Checkpoint@UpdateCheckpointTask', [$data->id, $data->toArray()]);

        return $checkpoint;
    }
}
