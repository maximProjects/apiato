<?php

namespace App\Containers\Confirmation\Tasks;

use App\Containers\Confirmation\Data\Repositories\ConfirmationRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteConfirmationTask extends Task
{

    protected $repository;

    public function __construct(ConfirmationRepository $repository)
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
