<?php

namespace App\Containers\Subscription\Tasks;

use Apiato\Core\Foundation\Apiato;
use App\Containers\Subscription\Data\Repositories\SubscriptionRegisterRepository;
use App\Containers\Subscription\Models\SubscriptionRegister;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSubscriptionsRegisterTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            \Apiato\Core\Foundation\Facades\Apiato::call('Subscription@CreateSubscriptionDocTask', [$data]);

            $register = $this->repository->create($data);
            return $register;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
