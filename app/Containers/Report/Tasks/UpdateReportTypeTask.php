<?php

namespace App\Containers\Report\Tasks;

use App\Containers\ReportType\Data\Repositories\ReportTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateReportTypeTask extends Task
{

    protected $repository;

    public function __construct(ReportTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
