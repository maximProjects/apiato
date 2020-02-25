<?php

namespace App\Containers\WorkIncapacity\Tasks;

use App\Containers\WorkIncapacity\Data\Repositories\WorkIncapacityTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllWorkIncapacityTypesTask extends Task
{

    protected $repository;

    public function __construct(WorkIncapacityTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
