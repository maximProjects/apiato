<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateSubscriptionsRegisterAction extends Action
{
    public function run(array $data)
    {

        $Subscriptionregister = Apiato::call('Subscription@CreateSubscriptionsRegisterTask', [$data]);

        return $Subscriptionregister;
    }
}
