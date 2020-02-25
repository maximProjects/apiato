<?php

namespace App\Containers\Discrepancy\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Attachment\Models\Attachment;
use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Discrepancy\Models\DiscrepancyAttachmentType;
use App\Containers\Media\Models\MediaType;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDiscrepancyAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $files)
    {
        try {
            $discrepancy = $this->repository->find($id);

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

                $media->each(function ($item) use (&$discrepancy) {
                    $discrepancy->media()->attach($item->id, ['type_id' => MediaType::Attachment]);
                });
                $mediaRelated = $discrepancy->media()->get();
                foreach ($mediaRelated as $m )
                {
                    $attach = Attachment::where('attachment_type', '=', Discrepancy::class)->where('media_id', '=', $m->id)->first();
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

                $media->each(function ($item) use (&$discrepancy) {
                    $discrepancy->media()->attach($item->id, ['type_id' => MediaType::Photo]);
                });
                $mediaRelated = $discrepancy->media()->get();
                foreach ($mediaRelated as $m )
                {
                    $attach = Attachment::where('attachment_type', '=', Discrepancy::class)->where('media_id', '=', $m->id)->first();
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

                $media->each(function ($item) use (&$discrepancy) {
                    $discrepancy->media()->attach($item->id, ['type_id' => MediaType::Document]);
                });
                $mediaRelated = $discrepancy->media()->get();
                foreach ($mediaRelated as $m )
                {
                    $attach = Attachment::where('attachment_type', '=', Discrepancy::class)->where('media_id', '=', $m->id)->first();
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

                $media->each(function ($item) use (&$discrepancy) {
                    $discrepancy->media()->attach($item->id, ['type_id' => MediaType::Video]);
                });
                $mediaRelated = $discrepancy->media()->get();
                foreach ($mediaRelated as $m )
                {
                    $attach = Attachment::where('attachment_type', '=', Discrepancy::class)->where('media_id', '=', $m->id)->first();
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
