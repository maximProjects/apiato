<?php

namespace App\Containers\Subscription\Actions;

use App\Containers\Subscription\Data\Transporters\SubscriptionsUpdatePlanTransporter;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class SubscriptionUpdatePlanAction extends Action
{
    public function run(SubscriptionsUpdatePlanTransporter $data)
    {

         $var = Apiato::call('Subscription@SubscriptionUpdatePlanTask', [$data->id, $data->toArray()]);
         return $var;
    }
}
