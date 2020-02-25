<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CloneProjectByIdTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {

            $project = $this->repository->find($id);
            $newProject = $project->replicate();
            $newProject->name = $newProject->name." Copy";
            $newProject->save();

//            $project->load('managers');
//
//
//            foreach ($project->getRelations() as $relationName => $values){
//
//
//                $newProject->{$relationName}()->sync($values);
//
//            }


            return $newProject;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
