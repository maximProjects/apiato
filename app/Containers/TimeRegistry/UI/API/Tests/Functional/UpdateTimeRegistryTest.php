<?php

namespace App\Containers\TimeRegistry\UI\API\Tests\Functional;

use App\Containers\TimeRegistry\Tests\ApiTestCase;

/**
 * Class UpdateTimeRegistryTest.
 *
 * @group timeregistry
 * @group api
 */
class UpdateTimeRegistryTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'patch@v1/time-registry/1';

    // fake some access rights
    protected $access = [
        'permissions' => 'update-timeregistries',
        'roles'       => 'admin',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "description" => "test job",
            "time_registry_id" => "1",
            "project_id" => "1",
            "project_group_id" => "1",
            "date_end" => "2019-08-15 18:35:25",
            "date_start" => "2019-09-21 18:35:25"
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
