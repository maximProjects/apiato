<?php

namespace App\Containers\Photo\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Photo\Data\Repositories\PhotoRepository;
use App\Containers\Photo\Models\Photo;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePhotoAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(PhotoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $files)
    {
        try {
            $photo = $this->repository->find($id);

            $uploads = Apiato::call('Media@UploadMediaTask', [$files]);

            $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

            $media->each(function ($item) use (&$photo) {
                $photo->media()->attach($item->id, ['type_id' => Photo::PHOTO_ATTACHMENT_TYPE_ALL]);
            });

            return $media;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
