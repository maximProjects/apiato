<?php

namespace App\Containers\Manager\UI\API\Tests\Functional;

use App\Containers\Manager\Tests\ApiTestCase;

/**
 * Class CreateManagerTest.
 *
 * @group manager
 * @group api
 */
class CreateManagerTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/managers';

    // fake some access rights
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function testCreateManager_()
    {
        $data = [
            'user_id' => 1,
        ];

        // send the HTTP request
        $response = $this->makeCall($data);


        // assert response status is correct
        $response->assertStatus(201);

        $responseContent = $this->getResponseContentObject();

        $this->assertNotEmpty($responseContent->data);

        // make other asserts here
        $this->assertDatabaseHas('managers', ['user_id' => $data['user_id']]);
    }

}
