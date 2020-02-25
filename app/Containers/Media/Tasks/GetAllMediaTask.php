<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Data\Repositories\MediaRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMediaTask extends Task
{

    protected $repository;

    public function __construct(MediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
