<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Job\Models\JobType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Apiato\Core\Foundation\Facades\Apiato;
use Exception;

class ChecklistsByJobTypeIdTask extends Task
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

            unset($data['id']);

            $checklists=[];

            foreach($data as $key => $checklist)
            {

                if($checklist['parent_id'] == null && $parent_id) {
                    $data[$key]['parent_id'] = $parent_id;

                    $checklist['parent_id'] = $parent_id;
                    Apiato::call('Checklist@UpdateChecklistTask', [$checklist['id'], [ "parent_id" => $checklist['parent_id']] ]);
                }

            }

            return $data;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
