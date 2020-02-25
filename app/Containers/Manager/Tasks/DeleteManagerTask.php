<?php

namespace App\Containers\Manager\Tasks;

use App\Containers\Manager\Data\Repositories\ManagerRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteManagerTask extends Task
{

    protected $repository;

    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
