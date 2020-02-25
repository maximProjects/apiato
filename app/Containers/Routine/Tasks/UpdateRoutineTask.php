<?php

namespace App\Containers\Routine\Tasks;

use App\Containers\Routine\Data\Repositories\RoutineRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class UpdateRoutineTask extends Task
{

    protected $repository;

    public function __construct(RoutineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $loc = App::getLocale();
            if(isset($data['name'])) {
                $data[$loc]['name'] = $data['name'];
                unset($data['name']);
            }
            if(isset($data['description'])) {
                $data[$loc]['description'] = $data['description'];
                unset($data['description']);
            }
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
