<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllReportsTask extends Task
{

    protected $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
