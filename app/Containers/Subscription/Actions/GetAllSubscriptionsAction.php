<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSubscriptionsAction extends Action
{
    public function run(Request $request)
    {
        $Subscriptions = Apiato::call('Subscription@GetAllSubscriptionsTask', [], ['addRequestCriteria']);

        return $Subscriptions;
    }
}
