<?php

namespace App\Containers\TimeRegistry\UI\API\Tests\Functional;

use App\Containers\TimeRegistry\Tests\ApiTestCase;

/**
 * Class ConfirmHoursTest.
 *
 * @group timeregistry
 * @group api
 */
class ConfirmHoursTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/time-registry/1/confirm-hours';

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
            "hours" => 99,
            "extra_time" => 21,
            "sum" => 2700,
            "balance_date" => "2019-10-14 00:00:00",
            "is_val" => 1
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
    }

}
