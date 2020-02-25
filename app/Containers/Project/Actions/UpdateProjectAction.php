<?php

namespace App\Containers\Project\Actions;

use App\Containers\Project\Data\Transporters\ProjectTransporter;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateProjectAction extends Action
{
    public function run(ProjectTransporter $data): Project
    {
        $project = Apiato::call('Project@UpdateProjectTask', [$data->id, $data->toArray()]);

        return $project;
    }
}
