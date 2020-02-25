<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllChecklistsTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        $parent_id = null;
        if(isset($data['parent_id'])) {
            $parent_id = $data['parent_id'];
        }
        //$this->repository->pushCriteria(new ThisEqualThatCriteria('parent_id', $parent_id));
        $checklists = $this->repository->orderBy('is_group', 'desc')->orderBy('is_group', 'asc')->get();
        //$result = $this->repository->getWithChild($checklists);
        return $checklists;
    }
}
