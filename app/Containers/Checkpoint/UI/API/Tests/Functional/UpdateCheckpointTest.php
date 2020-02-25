<?php

namespace App\Containers\Checkpoint\UI\API\Tests\Functional;

use App\Containers\Checkpoint\Tests\ApiTestCase;

/**
 * Class UpdateCheckpointTest.
 *
 * @group checkpoint
 * @group api
 */
class UpdateCheckpointTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'patch@v1/checkpoints/1';

    // fake some access rights
    protected $access = [
        'permissions' => 'update-checkpoints',
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
        $response->assertStatus(200);

        // make other asserts here
    }

}
