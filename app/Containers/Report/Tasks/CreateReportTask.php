<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateReportTask extends Task
{

    protected $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
