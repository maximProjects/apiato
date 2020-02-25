<?php

namespace App\Containers\ResourcePlan\Actions;

use App\Containers\ResourcePlan\Data\Transporters\ResourcePlansTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateResourcePlanAction extends Action
{
    public function run(ResourcePlansTransporter $data)
    {

        $resourceplan = Apiato::call('ResourcePlan@UpdateResourcePlanTask', [$data->id, $data->toArray()]);

        return $resourceplan;
    }
}
