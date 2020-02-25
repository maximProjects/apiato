<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checkpoint\Models\CheckpointState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CloneChecklistByIdTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $parent = null)
    {
        try {
            $checklist = $this->repository->find($id);

            $result = $this->clone($checklist, $parent);

            return $result;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }

    public function clone(Checklist $checklist, $parent_id = null)
    {

        $childsArr = $checklist->children()->get()->toArray();

        $newChecklist = $checklist->replicateWithTranslations();


        $newChecklist->is_template = 0;


        if($parent_id) {
            $newChecklist->parent_id = $parent_id;

        }

        $newChecklist->save();

        $checklist->load('checkpoints');

        $checkpoints = $checklist->checkpoints()->get();

        foreach ($checkpoints as $checkpoint) {
            $newCheckpoint = $checkpoint->replicate();
            $newCheckpoint->state_id = CheckpointState::New;
            $newCheckpoint->save();
            $newChecklist->checkpoints()->save($newCheckpoint);
        }



        if(is_array($childsArr)) {
            foreach ($childsArr as $ch) {
                $checklist = $this->repository->find($ch["id"]);
                $this->clone($checklist, $newChecklist->id);
            }

        }
        return $newChecklist;
    }
}
