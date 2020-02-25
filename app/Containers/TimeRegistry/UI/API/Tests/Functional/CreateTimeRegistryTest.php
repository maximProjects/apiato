<?php

namespace App\Containers\TimeRegistry\UI\API\Tests\Functional;

use App\Containers\TimeRegistry\Tests\ApiTestCase;

/**
 * Class CreateTimeRegistry.
 *
 * @group timeregistry
 * @group api
 */
class CreateTimeRegistryTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/time-registry';

    // fake some access rights
    protected $access = [
        'roles' => 'admin',
        'permissions' => 'create-timeregistries',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "description" => "test job",
            "user_id" => "1",
            "time_registry_id" => "1",
            "project_id" => "1",
            "project_group_id" => "1",
            "date_end" => "2019-08-15 18:35:25",
            "date_start" => "2019-09-21 18:35:25",
            "confirmed_hours" => "1",
            "jobs" => [
                [
                    "job_type_id" => "1",
		            "description" => "test job4",
                    "project_id" => "1",
                    "project_group_id" => "1",
                    "date_end" => "2019-08-15 18:35:25",
                    "date_start" => "2019-09-21 18:35:25"
                ],
                [
                    "job_type_id" => "1",
                    "description" => "test job5",
                    "project_id" => "1",
                    "project_group_id" => "1",
                    "date_end" => "2019-09-15 18:35:25",
                    "date_start" => "2019-09-21 18:35:25"
                ]
            ]
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $this->assertEquals('201', $response->getStatusCode());

        // make other asserts here
    }

}
