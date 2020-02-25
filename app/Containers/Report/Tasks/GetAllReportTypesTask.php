<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportTypeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllReportTypesTask extends Task
{

    protected $repository;

    public function __construct(ReportTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
