<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class SubscriptionAttachUsersAction extends Action
{
    public function run(array $data)
    {
        $Subscription = Apiato::call('Subscription@SubscriptionAttachUsersTask', [$data]);

        return $Subscription;
    }
}
