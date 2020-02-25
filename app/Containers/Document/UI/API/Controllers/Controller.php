<?php

namespace App\Containers\Document\UI\API\Controllers;

use App\Containers\Document\Data\Transporters\DocumentTransporter;
use App\Containers\Document\UI\API\Requests\CreateDocumentAttachmentsRequest;
use App\Containers\Document\UI\API\Requests\CreateDocumentRequest;
use App\Containers\Document\UI\API\Requests\DeleteDocumentRequest;
use App\Containers\Document\UI\API\Requests\GetAllDocumentsRequest;
use App\Containers\Document\UI\API\Requests\FindDocumentByIdRequest;
use App\Containers\Document\UI\API\Requests\GetDocumentAttachmentsRequest;
use App\Containers\Document\UI\API\Requests\GetDocumentsByProjectIdRequest;
use App\Containers\Document\UI\API\Requests\UpdateDocumentRequest;
use App\Containers\Document\UI\API\Transformers\DocumentTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Document\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDocumentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDocument(CreateDocumentRequest $request)
    {
        try{
            $dataArr = new DocumentTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new TaskArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $documents = [];

        foreach ($dataArr as $key => $values) {
            $tasks[] = Apiato::transactionalCall('Document@CreateDocumentAction', [$values]);

        }

        $result = new Collection($documents);

        return $this->created($this->transform($result, DocumentTransformer::class));
    }

    /**
     * @param FindDocumentByIdRequest $request
     * @return array
     */
    public function findDocumentById(FindDocumentByIdRequest $request)
    {
        $document = Apiato::call('Document@FindDocumentByIdAction', [$request]);

        return $this->transform($document, DocumentTransformer::class);
    }

    /**
     * @param GetAllDocumentsRequest $request
     * @return array
     */
    public function getAllDocuments(GetAllDocumentsRequest $request)
    {
        $documents = Apiato::call('Document@GetAllDocumentsAction', [$request]);

        return $this->transform($documents, DocumentTransformer::class);
    }

    /**
     * @param UpdateDocumentRequest $request
     * @return array
     */
    public function updateDocument(UpdateDocumentRequest $request)
    {
        $document = Apiato::call('Document@UpdateDocumentAction', [$request]);

        return $this->transform($document, DocumentTransformer::class);
    }

    /**
     * @param DeleteDocumentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDocument(DeleteDocumentRequest $request)
    {
        Apiato::call('Document@DeleteDocumentAction', [$request]);

        return $this->noContent();
    }

    public function getDocumentsByProjectId(GetDocumentsByProjectIdRequest $request)
    {
        $documents = Apiato::call('Document@GetDocumentsByProjectIdAction', [$request]);

        return $this->transform($documents, DocumentTransformer::class);
    }

    public function createDocumentAttachments(CreateDocumentAttachmentsRequest $request)
    {
        
        $media = Apiato::transactionalCall('Document@CreateDocumentAttachmentsAction', [$request->id, $request->file()]);

        return $media;
    }

    public function getDocumentAttachments(GetDocumentAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Document@GetDocumentAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }
}
