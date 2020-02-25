<?php

namespace App\Containers\Invoice\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Invoice\Data\Repositories\InvoiceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\Invoice\Models\InvoiceAttachmentType;

class UpdateInvoiceAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $files)
    {

        try {

            $invoice = $this->repository->find($id);

            $uploads = Apiato::call('Media@UploadMediaTask', [$files]);

            $media = Apiato::call('Media@CreateMediaTask', [$uploads]);

            $media->each(function ($item) use (&$invoice) {
                $invoice->media()->attach($item->id, ['type_id' => InvoiceAttachmentType::All]);

            });

            return $media;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
