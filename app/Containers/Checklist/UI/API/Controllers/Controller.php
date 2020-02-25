<?php

namespace App\Containers\Checklist\UI\API\Controllers;

use App\Containers\Checklist\Data\Transporters\ChecklistArrayTransporter;
use App\Containers\Checklist\Data\Transporters\ChecklistsByJobTypeIdArrayTransporter;
use App\Containers\Checklist\Data\Transporters\ChecklistsByJobTypeIdTransporter;
use App\Containers\Checklist\Data\Transporters\ChecklistTransporter;
use App\Containers\Checklist\UI\API\Requests\ChecklistsByJobTypesIdRequest;
use App\Containers\Checklist\UI\API\Requests\ChecklistsImportRequest;
use App\Containers\Checklist\UI\API\Requests\ChecklistsTreeRequest;
use App\Containers\Checklist\UI\API\Requests\ChecklistsUpdateTreeRequest;
use App\Containers\Checklist\UI\API\Requests\CloneChecklistByIdRequest;
use App\Containers\Checklist\UI\API\Requests\CreateChecklistAttachmentsRequest;
use App\Containers\Checklist\UI\API\Requests\CreateChecklistCommentsRequest;
use App\Containers\Checklist\UI\API\Requests\CreateChecklistRequest;
use App\Containers\Checklist\UI\API\Requests\DeleteChecklistRequest;
use App\Containers\Checklist\UI\API\Requests\GetAllChecklistsRequest;
use App\Containers\Checklist\UI\API\Requests\FindChecklistByIdRequest;
use App\Containers\Checklist\UI\API\Requests\GetChecklistAttachmentsRequest;
use App\Containers\Checklist\UI\API\Requests\GetChecklistCommentsRequest;
use App\Containers\Checklist\UI\API\Requests\GetChecklistsByJobTypeIdRequest;
use App\Containers\Checklist\UI\API\Requests\GetChecklistsByProjectIdRequest;
use App\Containers\Checklist\UI\API\Requests\UpdateChecklistRequest;
use App\Containers\Checklist\UI\API\Transformers\ChecklistTransformer;

use App\Containers\Checklist\UI\API\Transformers\JobTypesChecklistTransformer;
use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Checklist\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateChecklistRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createChecklist(CreateChecklistRequest $request)
    {

        try{
            $dataArr = new ChecklistTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ChecklistArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $checklists = [];

        foreach ($dataArr as $key => $values) {
            $checklists[] = Apiato::transactionalCall('Checklist@CreateChecklistAction', [$values, $request->file()]);

        }

        $result = new Collection($checklists);

        return $this->created($this->transform($result, ChecklistTransformer::class));
    }

    public function updateTree(ChecklistsUpdateTreeRequest $request)
    {
        try{
            $dataArr = new ChecklistTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ChecklistArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $checklists = Apiato::call('Checklist@ChecklistsUpdateTreeAction', [$dataArr]);
        return $this->transform($checklists, ChecklistTransformer::class);
    }

    /**
     * @param FindChecklistByIdRequest $request
     * @return array
     */
    public function findChecklistById(FindChecklistByIdRequest $request)
    {
        $checklist = Apiato::call('Checklist@FindChecklistByIdAction', [$request]);

        return $this->transform($checklist, ChecklistTransformer::class);
    }

    /**
     * @param GetAllChecklistsRequest $request
     * @return array
     */
    public function getAllChecklists(GetAllChecklistsRequest $request)
    {
        $checklists = Apiato::call('Checklist@GetAllChecklistsAction', [new DataTransporter($request)]);

        $result = new Collection($checklists);
        return $this->transform($result, ChecklistTransformer::class);
    }

    /**
     * @param UpdateChecklistRequest $request
     * @return array
     */
    public function updateChecklist(UpdateChecklistRequest $request)
    {
        $dataTransporter = new ChecklistTransporter(
            array_merge($request->all(), [])
        );


        $checklist = Apiato::transactionalCall('Checklist@UpdateChecklistAction',  [$dataTransporter]);

        return $this->transform($checklist, ChecklistTransformer::class);
    }


    /**
     * @param CloneChecklistByIdRequest $request
     * @return array
     */
    public function cloneChecklistById(CloneChecklistByIdRequest $request)
    {
        $checklist = Apiato::transactionalCall('Checklist@CloneChecklistByIdAction',  [new DataTransporter($request)]);
        return $checklist;
        //return $this->transform($checklist, ChecklistTransformer::class);
    }

    /**
     * @param DeleteChecklistRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteChecklist(DeleteChecklistRequest $request)
    {
        Apiato::transactionalCall('Checklist@DeleteChecklistAction', [$request]);

        return $this->noContent();
    }

    public function  getChecklistsByProjectId(GetChecklistsByProjectIdRequest $request)
    {
        $checklists = Apiato::call('Checklist@GetChecklistsByProjectIdAction', [new DataTransporter($request)]);

        $results = new Collection($checklists);

        return $this->transform($results, ChecklistTransformer::class);
    }

    public function getChecklistsByJobTypeId(GetChecklistsByJobTypeIdRequest $request)
    {

        $checklists = Apiato::call('Checklist@GetChecklistsByJobTypeIdAction', [$request]);


        $result = new Collection($checklists);

        return $this->transform($result, JobTypesChecklistTransformer::class);
    }

    public function createChecklistAttachments(CreateChecklistAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Checklist@CreateChecklistAttachmentsAction', [$request]);
        return $media;
    }

    public function getChecklistAttachments(GetChecklistAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Checklist@GetChecklistAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);

    }

    public function createChecklistComments(CreateChecklistCommentsRequest $request)
    {
        $dataTransporter = new CommentTransporter(
            array_merge($request->all(), [])
        );

        $dataArr = $dataTransporter->toArray();


        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        foreach ($dataArr as $key => $values) {
            $comments = Apiato::transactionalCall('Checklist@CreateChecklistCommentsAction', [$values]);

        }

        return $this->created($this->transform($comments, CommentTransformer::class));
    }

    public function getChecklistComments(GetChecklistCommentsRequest $request)
    {
        $comments = Apiato::transactionalCall('Checklist@GetChecklistCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }

    public function checklistsImport(ChecklistsImportRequest $request)
    {
        $checklists = Apiato::transactionalCall('Checklist@ImportChecklistsAction', [$request->file()]);
        return $checklists;
    }

    public function checklistsImportTranslate(ChecklistsImportRequest $request)
    {
        $checklists = Apiato::transactionalCall('Checklist@ImportChecklistsTranslateAction', [$request->file()]);
        return $checklists;
    }

    public function checklistsTree(ChecklistsTreeRequest $request)
    {
        try{
            $dataArr = new ChecklistTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ChecklistArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        foreach ($dataArr as $values)
        {
            $checklist = Apiato::call('Checklist@ChecklistsTreeAction', [$values]);
        }
        if(!$checklist) {
            return "not exist";
        }
        return $this->transform($checklist, ChecklistTransformer::class);
    }

    public function checklistsByJobTypeId(ChecklistsByJobTypesIdRequest $request)
    {
        try{
            $dataArr = new ChecklistsByJobTypeIdTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ChecklistsByJobTypeIdArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();
        $checklist = Apiato::call('Checklist@ChecklistsByJobTypeIdAction', [$dataArr]);
        return $checklist;
    }


    public function createChecklistByJobTypeId(ChecklistsByJobTypesIdRequest $request)
    {
        try{
            $dataArr = new ChecklistsByJobTypeIdTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ChecklistsByJobTypeIdArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();


            $checklists = Apiato::call('Checklist@CreateChecklistByJobTypeIdAction', [$dataArr]);
            $result = new Collection($checklists);
            return $this->transform($result, ChecklistTransformer::class);

    }
}
