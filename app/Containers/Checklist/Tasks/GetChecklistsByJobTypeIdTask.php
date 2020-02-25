<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Job\Models\JobType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetChecklistsByJobTypeIdTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($job_type_id)
    {
        try {

            $jobType = JobType::find($job_type_id);

            $checklist_id = $jobType->checklist_id;

            $result = Checklist::descendantsOf($checklist_id);

            return $result;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
