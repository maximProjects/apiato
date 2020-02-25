<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Data\Repositories\MediaRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMediaTask extends Task
{

    protected $repository;

    public function __construct(MediaRepository $repository)
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
