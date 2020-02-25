<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRegisterRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetAllSubscriptionsRegisterTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        try {
            return $this->repository->paginate();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
