<?php

namespace App\Containers\Statistic\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Statistic\Data\Repositories\StatisticRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindStatisticByIdTask extends Task
{

    protected $repository;

    public function __construct(StatisticRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            $project = Project::find($id);


            return $project;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
