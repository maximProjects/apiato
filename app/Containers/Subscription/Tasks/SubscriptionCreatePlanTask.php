<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Rennokki\Plans\Models\PlanModel;

class SubscriptionCreatePlanTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
          $plan = PlanModel::create($data);

            return $plan;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
