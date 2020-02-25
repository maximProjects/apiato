<?php

namespace App\Containers\Project\Actions;

use App\Containers\Project\Data\Transporters\ProjectGroupTransporter;
use App\Containers\Project\Models\ProjectGroup;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateProjectGroupAction extends Action
{
    public function run(ProjectGroupTransporter $data): ProjectGroup
    {
        $projectgroup = Apiato::call('Project@UpdateProjectGroupTask', [$data->id, $data->toArray()]);

        return $projectgroup;
    }
}
