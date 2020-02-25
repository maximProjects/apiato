<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobTypeRepository;
use App\Containers\Job\Models\JobTypeState;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Requests\Request;
use App\Ship\Parents\Tasks\Task;
use Astrotomic\Translatable\Translatable;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class UpdateJobTypeTask extends Task
{

    protected $repository;

    public function __construct(JobTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $loc = app()->getLocale();

//            if(isset($data['name'])) {
//                $data[$loc]['name'] = $data['name'];
//                unset($data['name']);
//            }
//            if(isset($data['description'])) {
//                $data[$loc]['description'] = $data['description'];
//                unset($data['description']);
//            }

            $jobType = $this->repository->find($id);

            if(!isset($data['state_id'])) {

                if($jobType) {
                    if($jobType->state_id == 0) {
                        $data['state_id'] = JobTypeState::New;
                    }
                }
            }
            $checklist = $jobType->checklist()->first();
            $checklist->is_template = 0;
            if(isset($data['name'])) {
                $checklist->name = $data['name'];
            } else {
                $checklist->name = $jobType->name;
            }
            if(isset($data['description'])) {
                $checklist->description = $data['description'];
            } else {
                $checklist->description = $jobType->description;
            }

            $checklist->save();
            return $this->repository->update($data, $id);
        }

        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
