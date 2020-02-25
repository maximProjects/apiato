<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Attachment\Data\Repositories\AttachmentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadMediaTask extends Task
{
    protected $repository;

    public function __construct(AttachmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $storage = Config::get('filesystems.default', Config::get('attachment-container.filesystem'));
        $user = Auth::user();
        $tenant_id = $user->getTenantId();
        foreach ($data as $file) {

            try {
                $file_name =  Storage::putFile(Config::get('attachment-container.storage_path')."/".$tenant_id, $file, 'public');
                $file->uploadedName = $file_name;
                $file->storageType = $storage;
            } catch (Exception $e) {
                throw new CreateResourceFailedException();
            }
        }

        return $data;
    }
}
