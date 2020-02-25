<?php

namespace App\Containers\Timer\Tasks;

use App\Containers\Timer\Data\Repositories\TimerRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllTimersTask extends Task
{

    protected $repository;

    public function __construct(TimerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
