<?php

namespace App\Containers\Photo\Tasks;

use App\Containers\Photo\Data\Repositories\PhotoRepository;
use App\Containers\Photo\Models\Photo;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use \Spatie\Tags\HasTags;

class CreatePhotoTask extends Task
{

    protected $repository;

    public function __construct(PhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
//            dump($data);
//            die;
            $photo = $this->repository->create($data);
            return $photo;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
