<?php

namespace App\Containers\Tag\UI\API\Controllers;

use App\Containers\Tag\UI\API\Requests\CreateTagRequest;
use App\Containers\Tag\UI\API\Requests\DeleteTagRequest;
use App\Containers\Tag\UI\API\Requests\GetAllTagsRequest;
use App\Containers\Tag\UI\API\Requests\FindTagByIdRequest;
use App\Containers\Tag\UI\API\Requests\UpdateTagRequest;
use App\Containers\Tag\UI\API\Transformers\TagTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Tag\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTag(CreateTagRequest $request)
    {
        $tag = Apiato::call('Tag@CreateTagAction', [$request]);

        return $this->created($this->transform($tag, TagTransformer::class));
    }

    /**
     * @param FindTagByIdRequest $request
     * @return array
     */
    public function findTagById(FindTagByIdRequest $request)
    {
        $tag = Apiato::call('Tag@FindTagByIdAction', [$request]);

        return $this->transform($tag, TagTransformer::class);
    }

    /**
     * @param GetAllTagsRequest $request
     * @return array
     */
    public function getAllTags(GetAllTagsRequest $request)
    {
        $tags = Apiato::call('Tag@GetAllTagsAction', [$request]);

        return $this->transform($tags, TagTransformer::class);
    }

    /**
     * @param UpdateTagRequest $request
     * @return array
     */
    public function updateTag(UpdateTagRequest $request)
    {
        $tag = Apiato::call('Tag@UpdateTagAction', [$request]);

        return $this->transform($tag, TagTransformer::class);
    }

    /**
     * @param DeleteTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTag(DeleteTagRequest $request)
    {
        Apiato::call('Tag@DeleteTagAction', [$request]);

        return $this->noContent();
    }
}
