<?php

namespace App\Containers\Checkpoint\UI\API\Tests\Functional;

use App\Containers\Checkpoint\Tests\ApiTestCase;

/**
 * Class CreateCheckpointsTest.
 *
 * @group checkpoint
 * @group api
 */
class CreateCheckpointsTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/checkpoints';

    // fake some access rights
    protected $access = [
        'permissions' => 'create-checkpoints',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "name" => "test",
	        "description" => "description"
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
    }

}
