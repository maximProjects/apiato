<?php

namespace App\Containers\Task\UI\API\Tests\Functional;

use App\Containers\Task\Tests\ApiTestCase;

/**
 * Class GetAllTaskTest.
 *
 * @group task
 * @group api
 */
class GetAllTaskTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'get@v1/tasks';

    // fake some access rights
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            // 'key' => 'value',
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
