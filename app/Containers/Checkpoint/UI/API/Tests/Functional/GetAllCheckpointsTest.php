<?php

namespace App\Containers\Checkpoint\UI\API\Tests\Functional;

use App\Containers\Checkpoint\Tests\ApiTestCase;

/**
 * Class GetAllCheckpointsTest.
 *
 * @group checkpoint
 * @group api
 */
class GetAllCheckpointsTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'get@v1/checkpoints';

    // fake some access rights
    protected $access = [
        'permissions' => 'list-checkpoints',
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
