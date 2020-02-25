<?php

namespace App\Containers\Project\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectAttachmentType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProjectAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $files)
    {
        try {
            $project = $this->repository->find($id);

            $uploads = Apiato::call('Media@UploadMediaTask', [$files]);

            $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

            $media->each(function ($item) use (&$project) {
                $project->media()->attach($item->id, ['type_id' => ProjectAttachmentType::All]);
            });

            return $media;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
