<?php

namespace App\Containers\WorkIncapacity\Tasks;

use App\Containers\WorkIncapacity\Data\Repositories\WorkIncapacityTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateWorkIncapacityTypeTask extends Task
{

    protected $repository;

    public function __construct(WorkIncapacityTypeRepository $repository)
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
