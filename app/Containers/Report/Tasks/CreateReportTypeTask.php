<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Report\Data\Repositories\ReportTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateReportTypeTask extends Task
{

    protected $repository;

    public function __construct(ReportTypeRepository $repository)
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
