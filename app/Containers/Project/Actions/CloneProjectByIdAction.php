<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CloneProjectByIdAction extends Action
{
    public function run(Request $request)
    {

        $project = Apiato::call('Project@CloneProjectByIdTask', [$request->id]);

        return $project;
    }
}
