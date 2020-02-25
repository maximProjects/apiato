<?php

namespace App\Containers\Comment\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Requests\DeleteCommentRequest;
use App\Containers\Comment\UI\API\Requests\GetAllCommentsRequest;
use App\Containers\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Containers\Comment\UI\API\Requests\UpdateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Comment\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCommentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createComment(CreateCommentRequest $request)
    {
        $dataTransporter = new CommentTransporter(
            array_merge($request->all(), [])
        );

        $dataArr = $dataTransporter->toArray();


        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $comments = [];

        foreach ($dataArr as $key => $values) {
            $comments[] = Apiato::transactionalCall('Comment@CreateCommentAction', [$values]);

        }
        $result = new Collection($comments);

        return $this->created($this->transform($result, CommentTransformer::class));
    }

    /**
     * @param FindCommentByIdRequest $request
     * @return array
     */
    public function findCommentById(FindCommentByIdRequest $request)
    {
        $comment = Apiato::call('Comment@FindCommentByIdAction', [$request]);

        return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @param GetAllCommentsRequest $request
     * @return array
     */
    public function getAllComments(GetAllCommentsRequest $request)
    {
        $comments = Apiato::call('Comment@GetAllCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }

    /**
     * @param UpdateCommentRequest $request
     * @return array
     */
    public function updateComment(UpdateCommentRequest $request)
    {
        $dataTransporter = new CommentTransporter(
            array_merge($request->all(), [])
        );

        $comment = Apiato::call('Comment@UpdateCommentAction', [$dataTransporter]);

        return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @param DeleteCommentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteComment(DeleteCommentRequest $request)
    {
        Apiato::call('Comment@DeleteCommentAction', [$request]);

        return $this->noContent();
    }
}
