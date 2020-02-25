<?php

namespace App\Containers\Message\UI\API\Transformers;

use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Message\Models\Message;
use App\Ship\Parents\Transformers\Transformer;

class MessageTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'comments'
    ];

    /**
     * @param Message $entity
     *
     * @return array
     */
    public function transform(Message $entity)
    {
        $response = [
            'object' => 'Message',
            'id' => $entity->getHashedKey(),
            'from' => $entity->from,
            'to' => $entity->toId,
            'project_id' => $entity->project_id,
            'project_group_id' => $entity->project_group_id,
            'cc' => $entity->cc,
            'subject' => $entity->subject,
            'content' => $entity->content,
            'status' => $entity->status,
            'type_id' => (int)$entity->type_id,
            'media' => $entity->media,
            'recipients' => $entity->recipients,
            'date_end' => $entity->date_end,
            'date_start' => $entity->date_start,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeComments(Message $entity)
    {

        return $this->collection($entity->comments, new CommentTransformer());
    }
}
