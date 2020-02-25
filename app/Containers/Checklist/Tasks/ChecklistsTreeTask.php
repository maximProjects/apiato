<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class ChecklistsTreeTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $parentId = null;
            $parent = Checklist::find($data['parent_id']);
            if($parent) {
                $parentId = $parent->id;
            }

            $checklist = Checklist::find($data['checklist_id']);

            if($checklist) {

                if ($checklist->is_template) {

                    $checklist = Apiato::call('Checklist@CloneChecklistByIdTask', [$checklist->id, $parentId]);
                } else {
                    $checklist->parent_id = $parentId;
                }

                $checklist = Apiato::call('Checklist@UpdateChecklistTask', [$checklist->id, $checklist->toArray()]);


            } else {
                return false;
            }

            return $checklist;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
