<?php

namespace App\Containers\Subscription\Tasks;

use App\Ship\Parents\Tasks\Task;
use Rennokki\Plans\Models\PlanModel;
use Rennokki\Plans\Models\PlanFeatureModel;

class SubscriptionUpdatePlanTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($id, $data)
    {
        $plan = PlanModel::find($id);

        $fArr =[];
        foreach ($data['features'] as $f) {
            $fArr[] = new PlanFeatureModel($f);
        }
        $plan->features()->saveMany($fArr);
        return $plan;


    }
}
