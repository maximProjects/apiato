<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Containers\Subscription\Models\Subscription;
use App\Containers\User\Models\User;
use App\Containers\User\Models\UserTenant;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateSubscriptionTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {


            $Subscription = $this->repository->create($data);

            $user = User::find($data['user_id']);

            $Subscription->users()->attach($user);
           // $Subscription->users()->sync($user->id);
            return $Subscription;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
