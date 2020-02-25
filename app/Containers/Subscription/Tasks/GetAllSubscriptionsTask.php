<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSubscriptionsTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
