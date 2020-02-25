<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Attachment\Models\Attachment;
use App\Containers\Media\Data\Repositories\MediaRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindMediaByIdTask extends Task
{

    protected $repository;

    public function __construct(MediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
