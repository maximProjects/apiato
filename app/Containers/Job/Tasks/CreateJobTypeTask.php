<?php

namespace App\Containers\Job\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Job\Data\Repositories\JobTypeRepository;
use App\Containers\Job\Models\JobTypeState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Transporters\DataTransporter;
use Exception;
use App\Containers\Job\Models\JobType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CreateJobTypeTask extends Task
{

    protected $repository;

    public function __construct(JobTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {


            $loc = App::getLocale();
//            if(isset($data['name'])) {
//                $data[$loc]['name'] = $data['name'];
//                unset($data['name']);
//            }
//            if(isset($data['description'])) {
//                $data[$loc]['description'] = $data['description'];
//                unset($data['description']);
//            }
            $jobType = null;
            $is_template = 0;
            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $jobType = JobType::where([['state_id', '=', JobTypeState::Draft], ['created_by', '=', $user->id]])->first();

               if($jobType) {
                   $jobType->update($data);
               }
                if(!$jobType) {
                    //die('create draft');
                    $jobType = $this->repository->create($data);
                }
            } else {
                //die('create normal');
               $jobType = $this->repository->create($data);

            }

            $dataChecklist = [
                'name' => $jobType->name,
                'description' => $jobType->description,
                'is_template' => $is_template,
                'is_group' => '1',
                'project_id' => $jobType->project_id,
                'project_group_id' => $jobType->project_group_id
            ];

            $checklist = Apiato::call('Checklist@CreateChecklistTask', [$dataChecklist]);

            $jobType->checklist_id = $checklist->id;

            $jobType->save();

            return $jobType;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }

}
