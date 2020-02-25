<?php

namespace App\Containers\Routine\Tasks;

use App\Containers\Routine\Data\Repositories\RoutineRepository;
use App\Containers\Routine\Models\Routine;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class CreateRoutineTask extends Task
{

    protected $repository;

    public function __construct(RoutineRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
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
            $parent = null;
            if (isset($data['parent_id'])) {
                $parent = Routine::find($data['parent_id']);
            }


            $node = Routine::create($data, $parent);

            return $node;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
