<?php

namespace App\Containers\Photo\UI\API\Controllers;

use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\Photo\UI\API\Requests\CreatePhotoAttachmentsRequest;
use App\Containers\Photo\UI\API\Requests\CreatePhotoRequest;
use App\Containers\Photo\UI\API\Requests\DeletePhotoRequest;
use App\Containers\Photo\UI\API\Requests\GetAllPhotosRequest;
use App\Containers\Photo\UI\API\Requests\FindPhotoByIdRequest;
use App\Containers\Photo\UI\API\Requests\GetPhotoAttachmentsRequest;
use App\Containers\Photo\UI\API\Requests\GetPhotosByProjectIdRequest;
use App\Containers\Photo\UI\API\Requests\UpdatePhotoRequest;
use App\Containers\Photo\UI\API\Transformers\PhotoTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Photo\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePhotoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPhoto(CreatePhotoRequest $request)
    {
        $photo = Apiato::call('Photo@CreatePhotoAction', [$request]);

        return $this->created($this->transform($photo, PhotoTransformer::class));
    }

    /**
     * @param FindPhotoByIdRequest $request
     * @return array
     */
    public function findPhotoById(FindPhotoByIdRequest $request)
    {
        $photo = Apiato::call('Photo@FindPhotoByIdAction', [$request]);

        return $this->transform($photo, PhotoTransformer::class);
    }

    /**
     * @param GetAllPhotosRequest $request
     * @return array
     */
    public function getAllPhotos(GetAllPhotosRequest $request)
    {
        $photos = Apiato::call('Photo@GetAllPhotosAction', [$request]);

        return $this->transform($photos, PhotoTransformer::class);
    }

    /**
     * @param UpdatePhotoRequest $request
     * @return array
     */
    public function updatePhoto(UpdatePhotoRequest $request)
    {
        $photo = Apiato::call('Photo@UpdatePhotoAction', [$request]);

        return $this->transform($photo, PhotoTransformer::class);
    }

    /**
     * @param DeletePhotoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePhoto(DeletePhotoRequest $request)
    {
        Apiato::call('Photo@DeletePhotoAction', [$request]);

        return $this->noContent();
    }

    public function getPhotosByProjectId(GetPhotosByProjectIdRequest $request)
    {
        $photos = Apiato::call('Photo@GetPhotosByProjectIdAction', [$request]);
        return $this->transform($photos, PhotoTransformer::class);
    }

    public function createPhotoAttachments(CreatePhotoAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Photo@CreatePhotoAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function  getPhotoAttachments(GetPhotoAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Photo@GetPhotoAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }
}
