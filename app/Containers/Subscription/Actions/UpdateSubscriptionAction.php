<?php

namespace App\Containers\Subscription\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSubscriptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'plan_id',
        ]);

        $Subscription = Apiato::call('Subscription@UpdateSubscriptionTask', [$request->id, $data]);

        return $Subscription;
    }
}
