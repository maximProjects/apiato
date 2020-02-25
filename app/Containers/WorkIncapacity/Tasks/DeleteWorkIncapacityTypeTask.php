<?php

namespace App\Containers\WorkIncapacity\Tasks;

use App\Containers\WorkIncapacity\Data\Repositories\WorkIncapacityTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteWorkIncapacityTypeTask extends Task
{

    protected $repository;

    public function __construct(WorkIncapacityTypeRepository $repository)
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
