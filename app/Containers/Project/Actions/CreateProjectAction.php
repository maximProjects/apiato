<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateProjectAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $project = Apiato::call('Project@CreateProjectTask', [$data]);

        if($files)
        {
            Apiato::call('Project@UpdateProjectAttachmentsTask', [$project->id, $files]);
        }

        $data['project_id'] = $project->id;
        $projectGroup = Apiato::call('Project@CreateProjectGroupTask', [$data]);

        return $project;
    }
}
