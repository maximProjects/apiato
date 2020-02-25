<?php

namespace App\Containers\Balance\UI\API\Tests\Functional;

use App\Containers\Balance\Tests\ApiTestCase;

/**
 * Class GetAllBalancesTest.
 *
 * @group balance
 * @group api
 */
class GetAllBalancesTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'get@v1/balances';

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
            // 'key' => 'value',
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
