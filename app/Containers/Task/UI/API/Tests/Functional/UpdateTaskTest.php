<?php

namespace App\Containers\Task\UI\API\Tests\Functional;

use App\Containers\Task\Tests\ApiTestCase;

/**
 * Class UpdateTaskTest.
 *
 * @group task
 * @group api
 */
class UpdateTaskTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'patch@v1/tasks/1';

    // fake some access rights
    protected $access = [
        'permissions' => 'update-tasks',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            'state_id' => 1,
            'project_id' => 1,
            'project_group_id' => 1,
            'user_id' => 1,
            'description' => "Test Task",
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
