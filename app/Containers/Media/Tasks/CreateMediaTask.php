<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Data\Repositories\MediaRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

    class CreateMediaTask extends Task
{

    protected $repository;

    public function __construct(MediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $arrUploadedFiles = array();

        try {

            foreach ($data as $file)
            {
                $attachment = array(
                    'file' => $file->getClientOriginalName(),
                    'file_size' => $file->getClientSize(),
                    'mime_type' => $file->getClientMimeType(),
                    'file_name' => $file->uploadedName,
                    'storage_type' => $file->storageType,
                );
                array_push($arrUploadedFiles, $this->repository->create($attachment));
            }


            if(count($arrUploadedFiles) > 1)
                return new Collection($arrUploadedFiles);
            return new Collection($arrUploadedFiles);

        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
