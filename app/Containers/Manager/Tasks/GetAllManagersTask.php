<?php

namespace App\Containers\Manager\Tasks;

use App\Containers\Manager\Data\Repositories\ManagerRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllManagersTask extends Task
{

    protected $repository;

    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
