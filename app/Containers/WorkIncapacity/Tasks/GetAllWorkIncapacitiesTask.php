<?php

namespace App\Containers\WorkIncapacity\Tasks;

use App\Containers\WorkIncapacity\Data\Repositories\WorkIncapacityRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllWorkIncapacitiesTask extends Task
{

    protected $repository;

    public function __construct(WorkIncapacityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
