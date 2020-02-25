<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Containers\Subscription\Models\Subscription;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Rennokki\Plans\Models\PlanModel;

class UpdateSubscriptionTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $plan_id = $data['plan_id'];
            $plan = PlanModel::find($plan_id);

            $subscription = Subscription::find($id);
            $subscription->subscribeTo($plan);
            return $subscription;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
