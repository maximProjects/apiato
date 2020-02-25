<?php

namespace App\Containers\Manager\Tasks;

use App\Containers\Manager\Data\Repositories\ManagerRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateManagerTask extends Task
{

    protected $repository;

    public function __construct(ManagerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
