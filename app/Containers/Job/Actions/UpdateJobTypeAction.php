<?php

namespace App\Containers\Job\Actions;

use App\Containers\Job\Data\Transporters\JobTypeTransporter;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateJobTypeAction extends Action
{
    public function run(JobTypeTransporter $data)
    {

        $jobtype = Apiato::call('Job@UpdateJobTypeTask', [$data->id, $data->toArray()]);

        return $jobtype;
    }
}
