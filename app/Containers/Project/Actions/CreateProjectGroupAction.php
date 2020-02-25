<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateProjectGroupAction extends Action
{
    public function run(array $data)
    {

        $project = Apiato::call('Project@CreateProjectGroupTask', [$data]);

        return $project;
    }
}
