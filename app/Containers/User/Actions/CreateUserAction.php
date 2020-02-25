<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Auth;

class CreateUserAction extends Action
{
    public function run(array $data, $files = null)
    {
        $user = Apiato::transactionalCall('User@RegisterUserAction', [$data, $files]);

        if($user) {
            $thisUser = Auth::user();
            $subscrId = $thisUser->subscriptions()->first()->id;
            Apiato::transactionalCall('Subscription@SubscriptionAttachUsersTask', [['id' => $subscrId, 'users' => [$user->id]]]);
        }
        return $user;
    }
}
