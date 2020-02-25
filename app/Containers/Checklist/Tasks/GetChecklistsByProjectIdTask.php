<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetChecklistsByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $parent_id = null;
            if(isset($data['parent_id'])) {
                $parent_id = $data['parent_id'];
            }
            $id = $data['id'];

            $checklist = Checklist::where('project_id', $id)->first();
            $result =  Checklist::descendantsAndSelf($checklist->id);
            return $result;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
