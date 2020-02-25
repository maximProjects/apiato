<?php

namespace App\Containers\Manager\Tasks;

use App\Containers\Manager\Data\Repositories\ManagerRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateManagerTask extends Task
{

    protected $repository;

    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->updateOrCreate($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
