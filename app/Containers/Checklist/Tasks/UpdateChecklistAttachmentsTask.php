<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Attachment\Models\Attachment;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Models\ChecklistAttachmentType;
use App\Containers\Media\Models\MediaType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateChecklistAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $files)
    {
        try {
            $checklist = $this->repository->find($id);

            $media = [];
            $mediaResult = [];
            if(isset($files['attachments'])) {
                $thisFIles = $files['attachments'];
                if($thisFIles && !is_array($thisFIles))
                    $thisFIles = [$thisFIles];

                if(!array_key_exists('0', $thisFIles) && !empty($thisFIles))
                    $thisFIles = [$thisFIles];

                $uploads = Apiato::call('Media@UploadMediaTask', [$thisFIles]);

                $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

                $media->each(function ($item) use (&$checklist) {
                    $checklist->media()->attach($item->id, ['type_id' => MediaType::Attachment]);
                });
                $mediaRelated = $checklist->media()->get();
                foreach ($mediaRelated as $m )
                {
                    $attach = Attachment::where('attachment_type', '=', Checklist::class)->where('media_id', '=', $m->id)->first();

                    //$attach->attachTags(['project_id '.$task->project_id, 'project_group_id: '.$task->project_group_id]);

                }
                $a = $media->toArray();
                $mediaResult = array_merge($mediaResult, $a);
            }

            if(isset($files['photos'])) {

                $thisFIles = $files['photos'];
                if($thisFIles && !is_array($thisFIles))
                    $thisFIles = [$thisFIles];

                if(!array_key_exists('0', $thisFIles) && !empty($thisFIles))
                    $thisFIles = [$thisFIles];

                $uploads = Apiato::call('Media@UploadMediaTask', [$thisFIles]);

                $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

                $media->each(function ($item) use (&$checklist) {
                    $checklist->media()->attach($item->id, ['type_id' => MediaType::Photo]);
                });
                $mediaRelated = $checklist->media()->get();
                foreach ($mediaRelated as $m )
                {
                    // $m->attachTag('tag 1');

                    $attach = Attachment::where('attachment_type', '=', Checklist::class)->where('media_id', '=', $m->id)->first();

                    // $attach->attachTags(['project_id '.$task->project_id, 'project_group_id: '.$task->project_group_id]);

                }
                $a = $media->toArray();
                $mediaResult = array_merge($mediaResult, $a);
            }

            if(isset($files['documents'])) {

                $thisFIles = $files['documents'];
                if($thisFIles && !is_array($thisFIles))
                    $thisFIles = [$thisFIles];

                if(!array_key_exists('0', $thisFIles) && !empty($thisFIles))
                    $thisFIles = [$thisFIles];

                $uploads = Apiato::call('Media@UploadMediaTask', [$thisFIles]);

                $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

                $media->each(function ($item) use (&$checklist) {
                    $checklist->media()->attach($item->id, ['type_id' => MediaType::Document]);
                });
                $mediaRelated = $checklist->media()->get();
                foreach ($mediaRelated as $m )
                {
                    // $m->attachTag('tag 1');

                    $attach = Attachment::where('attachment_type', '=', Checklist::class)->where('media_id', '=', $m->id)->first();

                    //  $attach->attachTags(['project_id '.$task->project_id, 'project_group_id: '.$task->project_group_id]);

                }
                $a = $media->toArray();
                $mediaResult = array_merge($mediaResult, $a);
            }

            if(isset($files['videos']) && count($files['videos']) > 0) {

                $thisFIles = $files['videos'];
                if($thisFIles && !is_array($thisFIles))
                    $thisFIles = [$thisFIles];

                if(!array_key_exists('0', $thisFIles) && !empty($thisFIles))
                    $thisFIles = [$thisFIles];
                $uploads = Apiato::call('Media@UploadMediaTask', [$thisFIles]);

                $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

                $media->each(function ($item) use (&$checklist) {
                    $checklist->media()->attach($item->id, ['type_id' => MediaType::Video]);
                });
                $mediaRelated = $checklist->media()->get();
                foreach ($mediaRelated as $m )
                {
                    // $m->attachTag('tag 1');

                    $attach = Attachment::where('attachment_type', '=', Checklist::class)->where('media_id', '=', $m->id)->first();

                    //   $attach->attachTags(['project_id '.$task->project_id, 'project_group_id: '.$task->project_group_id]);

                }
                $a = $media->toArray();
                $mediaResult = array_merge($mediaResult, $a);
            }
            // $mediaResult = new Collection($mediaResult);
            return $mediaResult;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
