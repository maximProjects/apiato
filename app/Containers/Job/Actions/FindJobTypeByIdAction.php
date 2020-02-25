<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindJobTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $jobtype = Apiato::call('JobType@FindJobTypeByIdTask', [$request->id]);

        return $jobtype;
    }
}
