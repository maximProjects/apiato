<?php

namespace App\Containers\Job\UI\API\Tests\Functional;

use App\Containers\Job\Tests\ApiTestCase;

/**
 * Class CreateJobTest.
 *
 * @group job
 * @group api
 */
class CreateJobTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/jobs';

    // fake some access rights
    protected $access = [
        'permissions' => 'create-jobs',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "description" => "test job",
            "time_registry_id" => 1,
            "project_id" => 1,
            "project_group_id" => 1,
            "duration" => "2019-10-15 13:20:25"
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
    }

}
