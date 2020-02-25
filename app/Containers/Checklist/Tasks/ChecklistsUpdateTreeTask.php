<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class ChecklistsUpdateTreeTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $ids = [];
            foreach($data as $item) {
              $ids[] = $item['id'];
            }
            Checklist::rebuildTree($data);
            $checklists = Checklist::whereIn('id', $ids)->paginate();

            return $checklists;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
