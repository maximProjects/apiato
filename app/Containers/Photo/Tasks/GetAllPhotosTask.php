<?php

namespace App\Containers\Photo\Tasks;

use App\Containers\Photo\Data\Repositories\PhotoRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPhotosTask extends Task
{

    protected $repository;

    public function __construct(PhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
