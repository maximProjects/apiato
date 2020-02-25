<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportTypeRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteReportTypeTask extends Task
{

    protected $repository;

    public function __construct(ReportTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
