<?php

namespace App\Containers\Job\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteJobTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Job@DeleteJobTypeTask', [$request->id]);
    }
}
