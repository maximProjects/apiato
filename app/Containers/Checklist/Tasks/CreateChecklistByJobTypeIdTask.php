<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Job\Models\JobType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateChecklistByJobTypeIdTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($job_type_id, $data)
    {
        try {
            $job_type = JobType::find($job_type_id);
            $parent_id = $job_type->checklist_id;
            $checklists = [];
            unset($data['id']);

            if(!isset($data[0])) {
                if(isset($data['parent_id'])) {
                    $parent_id = $data['parent_id'];
                }
                $data['parent_id'] = $parent_id;
                $checklists[] = Apiato::call('Checklist@CreateChecklistTask', [$data]);
            } else {
                foreach ($data as $key => $checklist) {
                    if (is_array($checklist)) {
                        if(isset($checklist['parent_id'])) {
                            $parent_id = $checklist['parent_id'];
                        }
                        $checklist['parent_id'] = $parent_id;
                        $checklists[] = Apiato::call('Checklist@CreateChecklistTask', [$checklist]);
                    }

                }
            }

            return $checklists;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
