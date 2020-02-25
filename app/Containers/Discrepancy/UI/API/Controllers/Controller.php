<?php

namespace App\Containers\Discrepancy\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Discrepancy\Data\Transporters\DiscrepancyArrayTransporter;
use App\Containers\Discrepancy\Data\Transporters\DiscrepancyTransporter;
use App\Containers\Discrepancy\UI\API\Requests\CreateDiscrepancyAttachmentsRequest;
use App\Containers\Discrepancy\UI\API\Requests\CreateDiscrepancyCommentsRequest;
use App\Containers\Discrepancy\UI\API\Requests\CreateDiscrepancyRequest;
use App\Containers\Discrepancy\UI\API\Requests\DeleteDiscrepancyRequest;
use App\Containers\Discrepancy\UI\API\Requests\GetAllDiscrepanciesRequest;
use App\Containers\Discrepancy\UI\API\Requests\FindDiscrepancyByIdRequest;
use App\Containers\Discrepancy\UI\API\Requests\GetDiscrepanciesByProjectIdRequest;
use App\Containers\Discrepancy\UI\API\Requests\GetDiscrepancyAttachmentsRequest;
use App\Containers\Discrepancy\UI\API\Requests\GetDiscrepancyCommentsRequest;
use App\Containers\Discrepancy\UI\API\Requests\UpdateDiscrepancyRequest;
use App\Containers\Discrepancy\UI\API\Transformers\DiscrepancyTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Discrepancy\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDiscrepancyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDiscrepancy(CreateDiscrepancyRequest $request)
    {

        try{
            $dataArr = new DiscrepancyTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new DiscrepancyArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $discrepancies = [];

        foreach ($dataArr as $key => $values) {
            $discrepancies[] = Apiato::transactionalCall('Discrepancy@CreateDiscrepancyAction', [$values]);

        }
        $result = new Collection($discrepancies);

        return $this->created($this->transform($result, DiscrepancyTransformer::class));
    }

    /**
     * @param FindDiscrepancyByIdRequest $request
     * @return array
     */
    public function findDiscrepancyById(FindDiscrepancyByIdRequest $request)
    {
        $discrepancy = Apiato::call('Discrepancy@FindDiscrepancyByIdAction', [$request]);

        return $this->transform($discrepancy, DiscrepancyTransformer::class);
    }

    public function getDiscrepancyByProjectId(GetDiscrepanciesByProjectIdRequest $request)
    {
        $discrepancy = Apiato::call('Discrepancy@GetDiscrepanciesByProjectIdAction', [$request]);

        return $this->transform($discrepancy, DiscrepancyTransformer::class);
    }

    /**
     * @param GetAllDiscrepanciesRequest $request
     * @return array
     */
    public function getAllDiscrepancies(GetAllDiscrepanciesRequest $request)
    {
        $discrepancies = Apiato::call('Discrepancy@GetAllDiscrepanciesAction', [$request]);

        return $this->transform($discrepancies, DiscrepancyTransformer::class);
    }

    /**
     * @param UpdateDiscrepancyRequest $request
     * @return array
     */
    public function updateDiscrepancy(UpdateDiscrepancyRequest $request)
    {

        $dataTransporter = new DiscrepancyTransporter(
            array_merge($request->all(), [])
        );

        $discrepancy = Apiato::transactionalCall('Discrepancy@UpdateDiscrepancyAction', [$dataTransporter]);

        return $this->transform($discrepancy, DiscrepancyTransformer::class);
    }

    /**
     * @param DeleteDiscrepancyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDiscrepancy(DeleteDiscrepancyRequest $request)
    {
        Apiato::transactionalCall('Discrepancy@DeleteDiscrepancyAction', [$request]);

        return $this->noContent();
    }

    public function createDiscrepancyAttachments(CreateDiscrepancyAttachmentsRequest $request)
    {

        $media = Apiato::transactionalCall('Discrepancy@CreateDiscrepancyAttachmentsAction', [$request]);

        return $media;
    }

    public function getDiscrepancyAttachments(GetDiscrepancyAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Discrepancy@GetDiscrepancyAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function createDiscrepancyComments(CreateCommentRequest $request)
    {
        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'Discrepancy@CreateDiscrepancyCommentsAction']);

        $comments = new Collection($comments);

        return $this->created($this->transform($comments, CommentTransformer::class));
    }

    public function getDiscrepancyComments(GetDiscrepancyCommentsRequest $request)
    {
        $comments = Apiato::transactionalCall('Discrepancy@GetDiscrepancyCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }
}
