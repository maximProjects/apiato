<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Containers\Job\Models\Job;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Spatie\Tags\Tag;

class CreateJobTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
            if(isset($data['id']) && !empty($data['id']))
            {

                $job = $this->repository->updateOrCreate($data);
            } else {

                $job = $this->repository->create($data);

            }
           // $job->attachTags(['project_id '.$job->project_id, 'project_group_id: '.$job->project_group_id]);

            return $job;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
