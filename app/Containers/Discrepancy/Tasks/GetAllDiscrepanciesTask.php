<?php

namespace App\Containers\Discrepancy\Tasks;

use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDiscrepanciesTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
