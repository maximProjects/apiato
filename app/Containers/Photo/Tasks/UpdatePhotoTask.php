<?php

namespace App\Containers\Photo\Tasks;

use App\Containers\Photo\Data\Repositories\PhotoRepository;
use App\Containers\Photo\Models\Photo;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePhotoTask extends Task
{

    protected $repository;

    public function __construct(PhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $photo = $this->repository->update($data, $id);
//            $photo->media()->detach();
//            if(isset($data['media'])&&count($data['media'])>0) {
//                foreach ($data['media'] as $file) {
//                    $photo->media()->attach($file, ['type_id' => Photo::PHOTO_ATTACHMENT_TYPE_ALL]);
//                }
//            }
            return $photo;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
