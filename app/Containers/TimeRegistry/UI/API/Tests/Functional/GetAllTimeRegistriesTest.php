<?php

namespace App\Containers\TimeRegistry\UI\API\Tests\Functional;

use App\Containers\TimeRegistry\Tests\ApiTestCase;

/**
 * Class GetAllTimeRegistriesTest.
 *
 * @group timeregistry
 * @group api
 */
class GetAllTimeRegistriesTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'get@v1/time-registry';

    // fake some access rights
    protected $access = [
        //'roles' => 'admin',
        'permissions' => 'list-timeregistries',
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
