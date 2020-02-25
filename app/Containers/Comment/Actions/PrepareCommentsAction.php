<?php

namespace App\Containers\Comment\Actions;

use App\Containers\Comment\Data\Transporters\CommentArrayTransporter;
use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;

class PrepareCommentsAction extends Action
{
    public function run(CreateCommentRequest $request, string $action)
    {
        try{
            $dataArr = new CommentTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new CommentArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $comment = Apiato::call($action, [$request->id, $dataArr]);

        return $comment;
    }
}
