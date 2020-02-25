<?php

namespace App\Containers\Message\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\Message\Data\Transporters\MessageArrayTransporter;
use App\Containers\Message\Data\Transporters\MessageTransporter;
use App\Containers\Message\UI\API\Requests\CreateMessageAttachmentsRequest;
use App\Containers\Message\UI\API\Requests\CreateMessageCommentsRequest;
use App\Containers\Message\UI\API\Requests\CreateMessageRequest;
use App\Containers\Message\UI\API\Requests\DeleteMessageRequest;
use App\Containers\Message\UI\API\Requests\GetAllMessagesRequest;
use App\Containers\Message\UI\API\Requests\FindMessageByIdRequest;
use App\Containers\Message\UI\API\Requests\GetMessageAttachmentsRequest;
use App\Containers\Message\UI\API\Requests\GetMessageCommentRequest;
use App\Containers\Message\UI\API\Requests\GetMessagesByProjectIdRequest;
use App\Containers\Message\UI\API\Requests\UpdateMessageRequest;
use App\Containers\Message\UI\API\Transformers\MessageTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Message\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateMessageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(CreateMessageRequest $request)
    {
        try{
            $dataArr = new MessageTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new MessageArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $messages = [];

        foreach ($dataArr as $key => $values) {
            $messages[] = Apiato::transactionalCall('Message@CreateMessageAction', [$values, $request->file()]);
        }
        $result = new Collection($messages);

        return $this->created($this->transform($result, MessageTransformer::class));
    }

    /**
     * @param FindMessageByIdRequest $request
     * @return array
     */
    public function findMessageById(FindMessageByIdRequest $request)
    {
        $message = Apiato::call('Message@FindMessageByIdAction', [$request]);

        return $this->transform($message, MessageTransformer::class);
    }

    /**
     * @param GetAllMessagesRequest $request
     * @return array
     */
    public function getAllMessages(GetAllMessagesRequest $request)
    {
        $messages = Apiato::call('Message@GetAllMessagesAction', [$request]);

        return $this->transform($messages, MessageTransformer::class);
    }

    /**
     * @param UpdateMessageRequest $request
     * @return array
     */
    public function updateMessage(UpdateMessageRequest $request)
    {
        $dataTransporter = new MessageTransporter(
            array_merge($request->all(), [])
        );

        $message = Apiato::call('Message@UpdateMessageAction', [$dataTransporter]);

        return $this->transform($message, MessageTransformer::class);
    }

    /**
     * @param DeleteMessageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMessage(DeleteMessageRequest $request)
    {
        Apiato::call('Message@DeleteMessageAction', [$request]);

        return $this->noContent();
    }

    public function getMessagesByProjectId(GetMessagesByProjectIdRequest $request)
    {
        $messages = Apiato::call('Message@GetMessagesByProjectIdAction', [$request]);

        return $this->transform($messages, MessageTransformer::class);
    }

    public function createMessageAttachments(CreateMessageAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Message@CreateMessageAttachmentsAction', [$request->id, $request->file()]);

        return $media;
    }

    public function getMessageAttachments(GetMessageAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Message@GetMessageAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function createMessageComments(CreateCommentRequest $request)
    {

        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'Message@CreateMessageCommentsAction']);

        $comments = new Collection($comments);

        return $this->created($this->transform($comments, CommentTransformer::class));
    }

    public function getMessageComments(GetMessageCommentRequest $request)
    {
        $comments = Apiato::transactionalCall('Message@GetMessageCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }
}
