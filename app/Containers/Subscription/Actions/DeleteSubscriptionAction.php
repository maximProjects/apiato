<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSubscriptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Subscription@DeleteSubscriptionTask', [$request->id]);
    }
}
