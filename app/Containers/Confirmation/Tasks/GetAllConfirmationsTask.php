<?php

namespace App\Containers\Confirmation\Tasks;

use App\Containers\Confirmation\Data\Repositories\ConfirmationRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllConfirmationsTask extends Task
{

    protected $repository;

    public function __construct(ConfirmationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
