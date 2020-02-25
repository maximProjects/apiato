<?php

namespace App\Containers\Job\Actions;

use App\Containers\Job\Data\Transporters\JobTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateJobAction extends Action
{
    public function run(JobTransporter $data)
    {
        $job = Apiato::call('Job@UpdateJobTask', [$data->id, $data->toArray()]);

        return $job;
    }
}
