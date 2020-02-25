<?php

namespace App\Containers\Job\UI\API\Controllers;

use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Containers\Comment\UI\API\Transformers\CommentTransformer;
use App\Containers\Job\Data\Transporters\JobArrayTransporter;
use App\Containers\Job\Data\Transporters\JobTransporter;
use App\Containers\Job\Data\Transporters\JobTypeTransporter;
use App\Containers\Job\UI\API\Requests\CreateJobAttachmentsRequest;
use App\Containers\Job\UI\API\Requests\CreateJobCommentsRequest;
use App\Containers\Job\UI\API\Requests\CreateJobRequest;
use App\Containers\Job\UI\API\Requests\DeleteJobRequest;
use App\Containers\Job\UI\API\Requests\GetAllJobsRequest;
use App\Containers\Job\UI\API\Requests\FindJobByIdRequest;
use App\Containers\Job\UI\API\Requests\GetJobAttachmentsRequest;
use App\Containers\Job\UI\API\Requests\GetJobCommentsRequest;
use App\Containers\Job\UI\API\Requests\GetJobTypesByProjectIdRequest;
use App\Containers\Job\UI\API\Requests\UpdateJobRequest;
use App\Containers\Job\UI\API\Transformers\JobTransformer;

use App\Containers\Job\UI\API\Requests\CreateJobTypeRequest;
use App\Containers\Job\UI\API\Requests\DeleteJobTypeRequest;
use App\Containers\Job\UI\API\Requests\GetAllJobTypesRequest;
use App\Containers\Job\UI\API\Requests\FindJobTypeByIdRequest;
use App\Containers\Job\UI\API\Requests\UpdateJobTypeRequest;

use App\Containers\Job\UI\API\Transformers\JobTypeTransformer;
use App\Containers\Media\UI\API\Transformers\MediaTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;

/**
 * Class Controller
 *
 * @package App\Containers\Job\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createJob(CreateJobRequest $request)
    {

        try{
            $dataArr = new JobTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new JobArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $jobs = [];

        foreach ($dataArr as $key => $values) {
            $jobs[] = Apiato::transactionalCall('Job@CreateJobAction', [$values, $request->file()]);

        }
        $result = new Collection($jobs);

        return $this->created($this->transform($result, JobTransformer::class));
    }

    /**
     * @param FindJobByIdRequest $request
     * @return array
     */
    public function findJobById(FindJobByIdRequest $request)
    {
        $job = Apiato::call('Job@FindJobByIdAction', [$request]);

        return $this->transform($job, JobTransformer::class);
    }

    /**
     * @param GetAllJobsRequest $request
     * @return array
     */
    public function getAllJobs(GetAllJobsRequest $request)
    {
        $jobs = Apiato::call('Job@GetAllJobsAction', [$request]);

        return $this->transform($jobs, JobTransformer::class);
    }

    /**
     * @param UpdateJobRequest $request
     * @return array
     */
    public function updateJob(UpdateJobRequest $request)
    {
        $dataTransporter = new JobTransporter(
            array_merge($request->all(), [])
        );

        $job = Apiato::call('Job@UpdateJobAction', [$dataTransporter]);

        return $this->transform($job, JobTransformer::class);
    }

    /**
     * @param DeleteJobRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteJob(DeleteJobRequest $request)
    {
        Apiato::call('Job@DeleteJobAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param CreateJobTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createJobType(CreateJobTypeRequest $request)
    {
        try{
            $dataArr = new JobTypeTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new JobTypeTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $jobtypes = [];

        foreach ($dataArr as $key => $values) {
            $jobtypes[] = Apiato::transactionalCall('Job@CreateJobTypeAction', [$values, $request->file()]);

        }
        $result = new Collection($jobtypes);

        return $this->created($this->transform($result, JobTypeTransformer::class));

    }

    /**
     * @param FindJobTypeByIdRequest $request
     * @return array
     */
    public function findJobTypeById(FindJobTypeByIdRequest $request)
    {
        $jobtype = Apiato::call('Job@FindJobTypeByIdAction', [$request]);

        return $this->transform($jobtype, JobTypeTransformer::class);
    }

    /**
     * @param GetAllJobTypesRequest $request
     * @return array
     */
    public function getAllJobTypes(GetAllJobTypesRequest $request)
    {

        $job_types = Apiato::call('Job@GetAllJobTypesAction', [new DataTransporter($request)]);

        return $this->transform($job_types, JobTypeTransformer::class);
    }

    /**
     * @param UpdateJobTypeRequest $request
     * @return array
     */
    public function updateJobType(UpdateJobTypeRequest $request)
    {
        $dataTransporter = new JobTypeTransporter(
            array_merge($request->all(), [])
        );

        $job = Apiato::call('Job@UpdateJobTypeAction', [$dataTransporter]);

        return $this->transform($job, JobTypeTransformer::class);

    }

    /**
     * @param DeleteJobTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteJobType(DeleteJobTypeRequest $request)
    {
        Apiato::call('Job@DeleteJobTypeAction', [$request]);

        return $this->noContent();
    }

    public function getJobTypesByProjectId(GetJobTypesByProjectIdRequest $request)
    {
        $jobTypes = Apiato::call('Job@GetJobTypesByProjectIdAction', [$request]);

        return $this->transform($jobTypes, JobTypeTransformer::class);
    }

    public function  createJobAttachments(CreateJobAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Job@CreateJobAttachmentsAction', [$request]);

        return $media;
    }

    public function getJobAttachments(GetJobAttachmentsRequest $request)
    {
        $media = Apiato::transactionalCall('Job@GetJobAttachmentsAction', [$request]);

        return $this->transform($media, MediaTransformer::class);
    }

    public function createJobComments(CreateJobCommentsRequest $request)
    {
        $dataTransporter = new CommentTransporter(
            array_merge($request->all(), [])
        );

        $dataArr = $dataTransporter->toArray();


        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        foreach ($dataArr as $key => $values) {
            $comments = Apiato::transactionalCall('Job@CreateJobCommentsAction', [$values]);

        }

        return $this->created($this->transform($comments, CommentTransformer::class));
    }

    public function getJobComments(GetJobCommentsRequest $request)
    {
        $comments = Apiato::transactionalCall('Job@GetJobCommentsAction', [$request]);

        return $this->transform($comments, CommentTransformer::class);
    }
}
