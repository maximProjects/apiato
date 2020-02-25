<?php

namespace App\Containers\Balance\UI\API\Tests\Functional;

use App\Containers\Balance\Tests\ApiTestCase;

/**
 * Class CreateMountlyBalanceTest.
 *
 * @group balance
 * @group api
 */
class CreateMountlyBalanceTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/balances/monthlybalances';

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
            "monthly_hours_id" => 12,
	        "user_id" => 1
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
