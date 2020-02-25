<?php

namespace App\Containers\Checkpoint\Tasks;

use App\Containers\Checkpoint\Data\Repositories\CheckpointRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class UpdateCheckpointTask extends Task
{

    protected $repository;

    public function __construct(CheckpointRepository $repository)
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
            $checkpoint = $this->repository->update($data, $id);

            if($checkpoint->checklist) {
                $checkpoint->checklist->setPercent();
            }
            return $checkpoint;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
