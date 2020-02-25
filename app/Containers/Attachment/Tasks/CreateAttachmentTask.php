<?php

namespace App\Containers\Attachment\Tasks;

use App\Containers\Attachment\Data\Repositories\AttachmentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class CreateAttachmentTask extends Task
{

    protected $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $arrAttachments = array();

        try {

            foreach ($data as $file)
            {
                array_push($arrAttachments, $this->repository->create($file));
            }

            dump($arrAttachments);exit;
            return new Collection($arrAttachments);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
