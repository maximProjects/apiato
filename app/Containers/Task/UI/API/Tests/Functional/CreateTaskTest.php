<?php

namespace App\Containers\Task\UI\API\Tests\Functional;

use App\Containers\Task\Tests\ApiTestCase;

/**
 * Class CreateTaskTest.
 *
 * @group task
 * @group api
 */
class CreateTaskTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/tasks';

    // fake some access rights
    protected $access = [
        'permissions' => 'create-tasks',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "state_id" => 1,
            "status" => 1,
            "project_id" => 1,
            "project_group_id" => 1,
            "user_id" => 1,
            "price_per_hour_extra" => 15694,
            "price_per_hour" => 6300,
            "budget_planned" => 2500,
            "date_end" => "2019-08-31 00:00:00",
            "date_start" => "2019-01-15 00:00:00",
            "description" => "sasadasd",
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
    }

}
