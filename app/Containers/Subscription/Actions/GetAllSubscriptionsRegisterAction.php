<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSubscriptionsRegisterAction extends Action
{
    public function run(Request $request)
    {
        $Subscriptionregister = Apiato::call('Subscription@GetAllSubscriptionsRegisterTask', []);

        return $Subscriptionregister;
    }
}
