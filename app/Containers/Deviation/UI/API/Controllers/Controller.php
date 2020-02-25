<?php

namespace App\Containers\Deviation\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentArrayTransporter;
use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Deviation\Data\Transporters\DeviationArrayTransporter;
use App\Containers\Deviation\Data\Transporters\DeviationTransporter;
use App\Containers\Deviation\UI\API\Requests\CreateDeviationAttachmentsRequest;
use App\Containers\Deviation\UI\API\Requests\CreateDeviationRequest;
use App\Containers\Deviation\UI\API\Requests\DeleteDeviationRequest;
use App\Containers\Deviation\UI\API\Requests\GetAllDeviationsRequest;
use App\Containers\Deviation\UI\API\Requests\FindDeviationByIdRequest;
use App\Containers\Deviation\UI\API\Requests\GetDeviationsByProjectIdRequest;
use App\Containers\Deviation\UI\API\Requests\UpdateDeviationRequest;
use App\Containers\Deviation\UI\API\Transformers\DeviationTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\TimeRegistry\UI\API\Requests\UpdateTimeRegistryRequest;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Deviation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDeviationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDeviation(CreateDeviationRequest $request)
    {
        try{
            $dataArr = new DeviationTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new DeviationArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $deviations = [];
        foreach ($dataArr as $key => $values) {
            $deviations[] = Apiato::transactionalCall('Deviation@CreateDeviationAction', [$values]);
        }
        $result = new Collection($deviations);

        return $this->created($this->transform($result, DeviationTransformer::class));
    }

    /**
     * @param FindDeviationByIdRequest $request
     * @return array
     */
    public function findDeviationById(FindDeviationByIdRequest $request)
    {
        $deviation = Apiato::call('Deviation@FindDeviationByIdAction', [$request]);

        return $this->transform($deviation, DeviationTransformer::class);
    }

    public function getDeviationsByProjectId(GetDeviationsByProjectIdRequest $request)
    {
        $deviation = Apiato::call('Deviation@GetDeviationsByProjectIdAction', [$request]);

        return $this->transform($deviation, DeviationTransformer::class);
    }

    /**
     * @param GetAllDeviationsRequest $request
     * @return array
     */
    public function getAllDeviations(GetAllDeviationsRequest $request)
    {
        $deviations = Apiato::call('Deviation@GetAllDeviationsAction', [$request]);

        return $this->transform($deviations, DeviationTransformer::class);
    }

    /**
     * @param UpdateDeviationRequest $request
     * @return array
     */
    public function updateDeviation(UpdateDeviationRequest $request)
    {
        $deviation = Apiato::call('Deviation@UpdateDeviationAction', [new DataTransporter($request)]);

        return $this->transform($deviation, DeviationTransformer::class);
    }

    /**
     * @param DeleteDeviationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDeviation(DeleteDeviationRequest $request)
    {
        Apiato::call('Deviation@DeleteDeviationAction', [$request]);

        return $this->noContent();
    }

    public function createDeviationAttachments(CreateDeviationAttachmentsRequest $request)
    {
        $media = Apiato::call('Deviation@CreateDeviationAttachmentsAction', [$request->id, $request->file()]);
        return $media;
    }

    public function createDeviationComments(CreateCommentRequest $request)
    {

        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'Deviation@CreateDeviationCommentAction']);

        $comments = new Collection($comments);

        return $this->transform($comments, CommentTransformer::class);

    }

    public function getDeviationAttachments(FindDeviationByIdRequest $request)
    {
        $media = Apiato::transactionalCall('Deviation@GetDeviationAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function getDeviationComments(FindDeviationByIdRequest $request)
    {
        $comments = Apiato::transactionalCall('Deviation@GetDeviationCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }

}
