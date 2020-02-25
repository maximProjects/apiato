<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllProjectGroupsAction extends Action
{
    public function run(Request $request)
    {
        $projects = Apiato::call('Project@GetAllProjectGroupsTask', [], ['addRequestCriteria']);

        return $projects;
    }
}
