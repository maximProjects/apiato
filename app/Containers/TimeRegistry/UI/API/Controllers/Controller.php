<?php

namespace App\Containers\TimeRegistry\UI\API\Controllers;

use App\Containers\Checklist\Data\Transporters\ChecklistTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\TimeRegistry\Data\Transporters\ConfirmHoursTransporter;
use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryArrayTransporter;
use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryIdSubmitTransporter;
use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryTransporter;
use App\Containers\TimeRegistry\UI\API\Requests\ConfirmHoursRequest;
use App\Containers\TimeRegistry\UI\API\Requests\createTimeRegistryAttachmentsRequest;
use App\Containers\TimeRegistry\UI\API\Requests\GetTimeRegistriesByProjectIdRequest;
use App\Containers\TimeRegistry\UI\API\Requests\CreateTimeRegistryRequest;
use App\Containers\TimeRegistry\UI\API\Requests\DeleteTimeRegistryRequest;
use App\Containers\TimeRegistry\UI\API\Requests\GetAllTimeRegistriesRequest;
use App\Containers\TimeRegistry\UI\API\Requests\FindTimeRegistryByIdRequest;
use App\Containers\TimeRegistry\UI\API\Requests\TimeRegistryIdSubmitRequest;
use App\Containers\TimeRegistry\UI\API\Requests\TimeRegistryIdTaskRequest;
use App\Containers\TimeRegistry\UI\API\Requests\UpdateTimeRegistryRequest;
use App\Containers\TimeRegistry\UI\API\Transformers\TimeRegistryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Response;

/**
 * Class Controller
 *
 * @package App\Containers\TimeRegistry\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTimeRegistryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTimeRegistry(CreateTimeRegistryRequest $request)
    {

        try{
            $dataArr = new TimeRegistryTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new TimeRegistryArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];



        $timeRegistries =[];
        foreach ($dataArr as $key => $values) {
            $timeRegistries[] = Apiato::transactionalCall('TimeRegistry@CreateTimeRegistryAction', [$values]);

        }
        $result = new Collection($timeRegistries);


        return $this->created($this->transform($result, TimeRegistryTransformer::class));
    }

    /**
     * @param FindTimeRegistryByIdRequest $request
     * @return array
     */
    public function findTimeRegistryById(FindTimeRegistryByIdRequest $request)
    {
        $timeregistry = Apiato::call('TimeRegistry@FindTimeRegistryByIdAction', [$request]);

        return $this->transform($timeregistry, TimeRegistryTransformer::class);
    }

    /**
     * @param GetAllTimeRegistriesRequest $request
     * @return array
     */
    public function getAllTimeRegistries(GetAllTimeRegistriesRequest $request)
    {
        $timeregistries = Apiato::call('TimeRegistry@GetAllTimeRegistriesAction', [$request]);

        return $this->transform($timeregistries, TimeRegistryTransformer::class);
    }

    /**
     * @param UpdateTimeRegistryRequest $request
     * @return array
     */
    public function updateTimeRegistry(UpdateTimeRegistryRequest $request)
    {

        $dataTransporter = new TimeRegistryTransporter(
            array_merge($request->all(), [])
        );

        $timeregistry = Apiato::call('TimeRegistry@UpdateTimeRegistryAction', [$dataTransporter]);

        return $this->transform($timeregistry, TimeRegistryTransformer::class);
    }

    /**
     * @param DeleteTimeRegistryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTimeRegistry(DeleteTimeRegistryRequest $request)
    {
        Apiato::call('TimeRegistry@DeleteTimeRegistryAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param \App\Containers\TimeRegistry\UI\API\Requests\GetTimeRegistriesByProjectIdRequest $request
     * @return array
     */
    public function getTimeRegistryByProjectId(GetTimeRegistriesByProjectIdRequest $request)
    {
        $timeregistry = Apiato::call('TimeRegistry@GetTimeRegistriesByProjectIdAction', [$request]);

        return $this->transform($timeregistry, TimeRegistryTransformer::class);
    }

    public function timeRegistryIdTask(TimeRegistryIdTaskRequest $request)
    {


      $dataTransporter = new TimeRegistryTransporter(
        array_merge($request->all(), [])
      );

      $dataArr = $dataTransporter->toArray();

      if(!array_key_exists(0, $dataArr))
        $dataArr = [$dataArr];

      $timeRegistries = [];

      foreach ($dataArr as $key => $values) {

        $timeRegistries[] = Apiato::transactionalCall('TimeRegistry@TimeRegistryIdTaskAction', [$values]);

      }

      $result = new Collection($timeRegistries);


      return $this->created($this->transform($result, TimeRegistryTransformer::class));
    }

    public function timeRegistryIdSubmit(TimeRegistryIdSubmitRequest $request) {
      $dataTransporter = new TimeRegistryIdSubmitTransporter(
        array_merge($request->all(), [])
      );

      $dataArr = $dataTransporter->toArray();

      if(!array_key_exists(0, $dataArr))
        $dataArr = [$dataArr];

      $timeRegistries = [];

      foreach ($dataArr as $key => $values) {

        $timeRegistries[] = Apiato::transactionalCall('TimeRegistry@TimeRegistryIdSubmitAction', [$values]);

      }

      $result = new Collection($timeRegistries);


      return $this->created($this->transform($result, TimeRegistryTransformer::class));
    }

    public function confirmHours(ConfirmHoursRequest $request)
    {
      $dataTransporter = new ConfirmHoursTransporter(
        array_merge($request->all(), [])
      );

      $dataArr = $dataTransporter->toArray();

      if(!array_key_exists(0, $dataArr))
        $dataArr = [$dataArr];

      $timeRegistries = [];

      foreach ($dataArr as $key => $values) {

        $timeRegistries[] = Apiato::transactionalCall('TimeRegistry@ConfirmHoursAction', [$values]);

      }

      $result = new Collection($timeRegistries);


      return $this->created($this->transform($result, TimeRegistryTransformer::class));
    }

    public function  createTimeRegistryAttachments(createTimeRegistryAttachmentsRequest $request) {
        $media = Apiato::call('TimeRegistry@CreateTimeRegistryAttachmentAction', [$request->id, $request->file()]);

        return $media;
    }

    public function createTimeRegistryComments(CreateCommentRequest $request)
    {

        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'TimeRegistry@CreateTimeRegistryCommentAction']);

        $comments = new Collection($comments);

        return $this->transform($comments, CommentTransformer::class);
    }

    public function getTimeRegistryComments(FindTimeRegistryByIdRequest $request) {
        $comments = Apiato::transactionalCall('TimeRegistry@GetTimeRegistryCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }

    public function getTimeRegistryAttachments(FindTimeRegistryByIdRequest $request) {
        $media = Apiato::transactionalCall('TimeRegistry@GetTimeRegistryAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function startTimeRegistry(CreateTimeRegistryRequest $request)
    {
        try{
            $dataArr = new TimeRegistryTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new TimeRegistryArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        foreach ($dataArr as $key => $values) {
            $timeRegistry = Apiato::transactionalCall('TimeRegistry@StartTimeRegistryAction', [$values]);

        }
        if(isset($timeRegistry['error'])) {
            return Response::json([
                'error' => 'distance'
            ], 400);
        }
      //  dump($timeRegistries);

        return $this->created($this->transform($timeRegistry, TimeRegistryTransformer::class));
    }

    public function finishTimeRegistry(CreateTimeRegistryRequest $request)
    {
      try{
        $dataArr = new TimeRegistryTransporter(
          array_merge($request->all(), [])
        );
      }catch (InvalidDataTypeException $e){

        $dataArr = new TimeRegistryArrayTransporter(
          array_merge($request->all(), [])
        );
      }

      $dataArr = $dataArr->toArray();

      if(!array_key_exists(0, $dataArr))
        $dataArr = [$dataArr];



      $timeRegistries =[];
      foreach ($dataArr as $key => $values) {
        $timeRegistries[]  = Apiato::transactionalCall('TimeRegistry@FinishTimeRegistryAction', [$values]);
      }
      if(!$timeRegistries[0]) {
        return [];
      }
      $result = new Collection($timeRegistries);

        return $this->created($this->transform($result, TimeRegistryTransformer::class));


    }

    public function sessionTimeRegistry(CreateTimeRegistryRequest $request)
    {
        $timeregistries = Apiato::call('TimeRegistry@SessionTimeRegistriesAction', [$request]);

        return $this->transform($timeregistries, TimeRegistryTransformer::class);
    }
}
