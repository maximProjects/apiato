<?php

namespace App\Containers\Discrepancy\Tasks;

use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteDiscrepancyTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
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
