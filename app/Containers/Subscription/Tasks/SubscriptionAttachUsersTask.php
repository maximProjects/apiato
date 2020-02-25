<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Containers\Subscription\Models\Subscription;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SubscriptionAttachUsersTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
          $Subscription  = Subscription::find($data['id']);
          if(isset($data['users']))
          {
            foreach ($data['users'] as $userId)
            {
              $Subscription->users()->attach($userId);
            }
          }
            return $Subscription;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
