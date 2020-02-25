<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateJobTypeAction extends Action
{
    public function run(array $data)
    {
        $jobtype = Apiato::call('Job@CreateJobTypeTask', [$data]);

        return $jobtype;
    }
}
