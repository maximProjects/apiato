<?php

namespace App\Containers\Job\UI\API\Tests\Functional;

use App\Containers\Job\Tests\ApiTestCase;

/**
 * Class UpdateJobTest.
 *
 * @group job
 * @group api
 */
class UpdateJobTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'patch@v1/jobs/1';

    // fake some access rights
    protected $access = [
        'permissions' => 'update-jobs',
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
        $response->assertStatus(200);

        // make other asserts here
    }

}
