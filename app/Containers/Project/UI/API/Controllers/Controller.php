<?php

namespace App\Containers\Project\UI\API\Controllers;

use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Containers\Project\Data\Transporters\ProjectArrayTransporter;
use App\Containers\Project\Data\Transporters\ProjectGroupArrayTransporter;
use App\Containers\Project\Data\Transporters\ProjectTransporter;
use App\Containers\Project\Data\Transporters\ProjectGroupTransporter;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Project\Tasks\GetAllProjectGropsTask;
use App\Containers\Project\UI\API\Requests\CloneProjectByIdRequest;
use App\Containers\Project\UI\API\Requests\CreateProjectAttachmentsRequest;
use App\Containers\Project\UI\API\Requests\CreateProjectGroupRequest;
use App\Containers\Project\UI\API\Requests\CreateProjectRequest;
use App\Containers\Project\UI\API\Requests\DeleteProjectGroupRequest;
use App\Containers\Project\UI\API\Requests\DeleteProjectRequest;
use App\Containers\Project\UI\API\Requests\GetAllProjectGroupsRequest;
use App\Containers\Project\UI\API\Requests\GetAllProjectsRequest;
use App\Containers\Project\UI\API\Requests\FindProjectByIdRequest;
use App\Containers\Project\UI\API\Requests\GetProjectAttachmentsRequest;
use App\Containers\Project\UI\API\Requests\GetProjectGroupsByProjectIdRequest;
use App\Containers\Project\UI\API\Requests\UpdateProjectRequest;
use App\Containers\Project\UI\API\Requests\UpdateProjectGroupRequest;
use App\Containers\Project\UI\API\Transformers\ProjectGroupTransformer;
use App\Containers\Project\UI\API\Transformers\ProjectTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class Controller
 *
 * @package App\Containers\Project\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProject(CreateProjectRequest $request)
    {

        try{
            $dataArr = new ProjectTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ProjectArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $projects =[];
        foreach ($dataArr as $key => $values) {
            $projects[] = Apiato::transactionalCall('Project@CreateProjectAction', [$values, $request->file()]);

        }
        $result = new Collection($projects);

        return $this->created($this->transform($result, ProjectTransformer::class));
    }

    /**
     * @param FindProjectByIdRequest $request
     * @return array
     */
    public function findProjectById(FindProjectByIdRequest $request)
    {
        //dump($request);


        $project = Apiato::call('Project@FindProjectByIdAction', [$request]);

        return $this->transform($project, ProjectTransformer::class);
    }


    /**
     * @param CloneProjectByIdRequest $request
     * @return array
     */
    public function cloneProjectById(CloneProjectByIdRequest $request)
    {

        $project = Apiato::transactionalCall('Project@CloneProjectByIdAction', [$request]);

        return $this->transform($project, ProjectTransformer::class);
    }

    /**
     * @param GetAllProjectsRequest $request
     * @return array
     */
    public function getAllProjects(GetAllProjectsRequest $request)
    {
        $projects = Apiato::call('Project@GetAllProjectsAction', [new DataTransporter($request)]);

        return $this->transform($projects, ProjectTransformer::class);
    }

    /**
     * @param UpdateProjectRequest $request
     * @return array
     */
    public function updateProject(UpdateProjectRequest $request)
    {
        $dataTransporter = new ProjectTransporter(
            array_merge($request->all(), [])
        );

        $project = Apiato::transactionalCall('Project@UpdateProjectAction',  [$dataTransporter]);

        return $this->transform($project, ProjectTransformer::class);
    }

    /**
     * @param DeleteProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProject(DeleteProjectRequest $request)
    {
        Apiato::transactionalCall('Project@DeleteProjectAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param DeleteProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProjectGroup(DeleteProjectGroupRequest $request)
    {
        Apiato::transactionalCall('Project@DeleteProjectGroupAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param \App\Containers\Project\UI\API\Requests\CreateProjectGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProjectGroup(CreateProjectGroupRequest $request)
    {

        try{
            $dataArr = new ProjectGroupTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ProjectGroupArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $projectGroups =[];

        foreach ($dataArr as $key => $values) {

            $projectGroups[] = Apiato::transactionalCall('Project@CreateProjectGroupAction', [$values]);
        }

        $result = new Collection($projectGroups);

        return $this->created($this->transform($result, ProjectGroupTransformer::class));
    }


    /**
     * @param \App\Containers\Project\UI\API\Requests\UpdateProjectGroupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProjectGroup(UpdateProjectGroupRequest $request)
    {

        $dataArr = $request->all();


        if(array_key_exists(0, $dataArr))
            $dataArr = $dataArr[0];

        $dataTransporter = new ProjectGroupTransporter(
            array_merge($dataArr, [])
        );


       $projectGroup = Apiato::transactionalCall('Project@UpdateProjectGroupAction', [$dataTransporter]);

        return $this->created($this->transform($projectGroup, ProjectGroupTransformer::class));
    }

    /**
     * @param \App\Containers\Project\UI\API\Requests\GetAllProjectGroupsRequest $request
     * @return array
     */
    public function getAllProjectGroups(GetAllProjectGroupsRequest $request)
    {
        $projects = Apiato::call('Project@GetAllProjectGroupsAction', [$request]);

        return $this->transform($projects, ProjectGroupTransformer::class);
    }


    public function getProjectGroupsByProjectId(GetProjectGroupsByProjectIdRequest $request)
    {
        $projects = Apiato::call('Project@GetProjectGroupsByProjectIdAction', [$request]);

        return $this->transform($projects, ProjectGroupTransformer::class);
    }

    public function createProjectAttachments(CreateProjectAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Project@CreateProjectAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function getProjectAttachments(GetProjectAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Project@GetProjectAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }
}
