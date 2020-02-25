<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Containers\Checkpoint\Events\Events\StatusEvent;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class CreateCheckpointTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
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
            $checkpoint =  $this->repository->create($data);
            return $checkpoint;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
