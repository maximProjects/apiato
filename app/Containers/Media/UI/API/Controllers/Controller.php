<?php

namespace App\Containers\Media\UI\API\Controllers;

use App\Containers\Media\UI\API\Requests\CreateMediaRequest;
use App\Containers\Media\UI\API\Requests\DeleteMediaRequest;
use App\Containers\Media\UI\API\Requests\GetAllMediaRequest;
use App\Containers\Media\UI\API\Requests\FindMediaByIdRequest;
use App\Containers\Media\UI\API\Requests\UpdateMediaRequest;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Media\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMediaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMedia(CreateMediaRequest $request)
    {
        $media = Apiato::call('Media@CreateMediaAction', [$request]);

        return $this->created($this->transform($media, MediaTransformer::class));
    }

    /**
     * @param FindMediaByIdRequest $request
     * @return array
     */
    public function findMediaById(FindMediaByIdRequest $request)
    {
        $media = Apiato::call('Media@FindMediaByIdAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param GetAllMediaRequest $request
     * @return array
     */
    public function getAllMedia(GetAllMediaRequest $request)
    {
        $media = Apiato::call('Media@GetAllMediaAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param UpdateMediaRequest $request
     * @return array
     */
    public function updateMedia(UpdateMediaRequest $request)
    {
        $media = Apiato::call('Media@UpdateMediaAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    /**
     * @param DeleteMediaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMedia(DeleteMediaRequest $request)
    {
        Apiato::call('Media@DeleteMediaAction', [$request]);

        return $this->noContent();
    }
}
