<?php

namespace App\Containers\Task\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentArrayTransporter;
use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\Task\Data\Transporters\TaskArrayTransporter;
use App\Containers\Task\Data\Transporters\TaskTransporter;
use App\Containers\Task\UI\API\Requests\CreateTaskAttachmentsRequest;
use App\Containers\Task\UI\API\Requests\CreateTaskCommentsRequest;
use App\Containers\Task\UI\API\Requests\CreateTaskRequest;
use App\Containers\Task\UI\API\Requests\DeleteTaskAttachmentRequest;
use App\Containers\Task\UI\API\Requests\DeleteTaskCommentRequest;
use App\Containers\Task\UI\API\Requests\DeleteTaskRequest;
use App\Containers\Task\UI\API\Requests\GetAllTasksRequest;
use App\Containers\Task\UI\API\Requests\FindTaskByIdRequest;
use App\Containers\Task\UI\API\Requests\GetTaskAttachmentsRequest;
use App\Containers\Task\UI\API\Requests\GetTaskCommentsRequest;
use App\Containers\Task\UI\API\Requests\GetTasksByProjectIdRequest;
use App\Containers\Task\UI\API\Requests\UpdateTaskAttachmentRequest;
use App\Containers\Task\UI\API\Requests\UpdateTaskCommentRequest;
use App\Containers\Task\UI\API\Requests\UpdateTaskRequest;
use App\Containers\Task\UI\API\Transformers\TaskTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @package App\Containers\Task\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTask(CreateTaskRequest $request)
    {
        try{
            $dataArr = new TaskTransporter(
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

        $tasks =[];
        foreach ($dataArr as $key => $values) {
            $tasks[] = Apiato::transactionalCall('Task@CreateTaskAction', [$values, $request->file()]);

        }
        $result = new Collection($tasks);


        return $this->created($this->transform($result, TaskTransformer::class));
    }

    /**
     * @param UpdateTaskRequest $request
     * @return array
     */
    public function updateTask(UpdateTaskRequest $request)
    {
        $dataTransporter = new TaskTransporter(
            array_merge($request->all(), [])
        );



        $task = Apiato::transactionalCall('Task@UpdateTaskAction', [$dataTransporter]);

        return $this->transform($task, TaskTransformer::class);
    }


    /**
     * @param FindTaskByIdRequest $request
     * @return array
     */
    public function findTaskById(FindTaskByIdRequest $request)
    {
        $task = Apiato::call('Task@FindTaskByIdAction', [$request]);

        return $this->transform($task, TaskTransformer::class);
    }

    /**
     * @param GetAllTasksRequest $request
     * @return array
     */
    public function getAllTasks(GetAllTasksRequest $request)
    {
        $tasks = Apiato::call('Task@GetAllTasksAction', [$request]);

        return $this->transform($tasks, TaskTransformer::class);
    }

    /**
     * @param DeleteTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTask(DeleteTaskRequest $request)
    {
        Apiato::transactionalCall('Task@DeleteTaskAction', [$request]);

        return $this->noContent();
    }

    public function getTasksByProjectId(GetTasksByProjectIdRequest $request)
    {
        $tasks = Apiato::call('Task@GetTasksByProjectIdAction', [$request]);

        return $this->transform($tasks, TaskTransformer::class);
    }

    public function UpdateTaskAttachments(UpdateTaskAttachmentRequest $request) {
        $media = Apiato::call('Task@UpdateTaskAttachmentAction', [$request->id, $request->file()]);

        //return $this->transform($result, MediaTransformer::class);
        return $media;
    }

    public function DeleteTaskAttachments(DeleteTaskAttachmentRequest $request) {
        die('DeleteTaskAttachments');
    }

    public function UpdateTaskComments(CreateCommentRequest $request)
    {

        $comments = Apiato::call('Comment@PrepareCommentsAction', [$request, 'Task@CreateTaskCommentsAction']);

        $comments = new Collection($comments);

        return $this->transform($comments, CommentTransformer::class);
    }

    public function DeleteTaskComments(DeleteTaskCommentRequest $request) {
        die('DeleteTaskComments');
    }

    public function getTaskComments(GetTaskCommentsRequest $request)
    {

        $comments = Apiato::transactionalCall('Task@GetTaskCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);

    }

    public function createTaskComments(CreateTaskCommentsRequest $request)
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


        $collection = Apiato::transactionalCall('Task@CreateTaskCommentsAction', [$request->id, $dataArr]);

        return $this->created($this->transform($collection, CommentTransformer::class));
    }

    public function  getTaskAttachments(GetTaskAttachmentsRequest $request)
    {

        $media = Apiato::transactionalCall('Task@GetTaskAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }


    public function  createTaskAttachments(CreateTaskAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Task@CreateTaskAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function addTaskChecklist(CreateTaskRequest $request)
    {
      try{
        $dataArr = new TaskTransporter(
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

      $tasks =[];

      foreach ($dataArr as $key => $values) {
        $tasks[] = Apiato::transactionalCall('Task@AddTaskChecklistAction', [$values, $request->file()]);

      }
      $result = new Collection($tasks);


      return $this->created($this->transform($result, TaskTransformer::class));
    }

    public function deleteTaskChecklists(DeleteTaskRequest $request)
    {
      try{
        $dataArr = new TaskTransporter(
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

      $tasks =[];

      foreach ($dataArr as $key => $values) {
        $tasks[] = Apiato::transactionalCall('Task@DeleteTaskChecklistAction', [$values]);

      }
      $result = new Collection($tasks);


      return $this->created($this->transform($result, TaskTransformer::class));
    }
}
