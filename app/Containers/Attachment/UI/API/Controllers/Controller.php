<?php

namespace App\Containers\Attachment\UI\API\Controllers;

use App\Containers\Attachment\UI\API\Requests\CreateAttachmentRequest;
use App\Containers\Attachment\UI\API\Requests\DeleteAttachmentRequest;
use App\Containers\Attachment\UI\API\Requests\GetAllAttachmentsRequest;
use App\Containers\Attachment\UI\API\Requests\FindAttachmentByIdRequest;
use App\Containers\Attachment\UI\API\Requests\UpdateAttachmentRequest;
use App\Containers\Attachment\UI\API\Transformers\AttachmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Attachment\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAttachmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAttachment(CreateAttachmentRequest $request)
    {

        $attachment = Apiato::call('Attachment@CreateAttachmentAction', [$request]);

        return $this->created($this->transform($attachment, AttachmentTransformer::class));
    }

    /**
     * @param FindAttachmentByIdRequest $request
     * @return array
     */
    public function findAttachmentById(FindAttachmentByIdRequest $request)
    {
        $attachment = Apiato::call('Attachment@FindAttachmentByIdAction', [$request]);

        return $this->transform($attachment, AttachmentTransformer::class);
    }

    /**
     * @param GetAllAttachmentsRequest $request
     * @return array
     */
    public function getAllAttachments(GetAllAttachmentsRequest $request)
    {
        $attachments = Apiato::call('Attachment@GetAllAttachmentsAction', [$request]);

        return $this->transform($attachments, AttachmentTransformer::class);
    }

    /**
     * @param UpdateAttachmentRequest $request
     * @return array
     */
    public function updateAttachment(UpdateAttachmentRequest $request)
    {
        $attachment = Apiato::call('Attachment@UpdateAttachmentAction', [$request]);

        return $this->transform($attachment, AttachmentTransformer::class);
    }

    /**
     * @param DeleteAttachmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttachment(DeleteAttachmentRequest $request)
    {
        Apiato::call('Attachment@DeleteAttachmentAction', [$request]);

        return $this->noContent();
    }
}
