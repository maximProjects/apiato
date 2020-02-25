<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetJobTypesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $jobtype = Apiato::call('Job@GetJobTypesByProjectIdTask', [$request->id]);

        return $jobtype;
    }
}
