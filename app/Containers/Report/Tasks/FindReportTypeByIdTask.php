<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindReportTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(ReportTypeRepository $repository)
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
