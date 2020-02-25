<?php

namespace App\Containers\Checklist\UI\API\Tests\Functional;

use App\Containers\Checklist\Tests\ApiTestCase;

/**
 * Class GetAllChecklistsTest.
 *
 * @group checklist
 * @group api
 */
class GetAllChecklistsTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'get@v1/checklists';

    // fake some access rights
    protected $access = [
        'permissions' => 'list-checklists',
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
