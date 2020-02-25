<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSubscriptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $Subscription = Apiato::call('Subscription@FindSubscriptionByIdTask', [$request->id]);

        return $Subscription;
    }
}
