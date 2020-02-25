<?php

namespace App\Containers\Checklist\UI\API\Tests\Functional;

use App\Containers\Checklist\Tests\ApiTestCase;

/**
 * Class CreateChecklistTest.
 *
 * @group checklist
 * @group api
 */
class CreateChecklistTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'post@v1/checklists';

    // fake some access rights
    protected $access = [
        'permissions' => 'create-checklists',
        'roles'       => '',
    ];

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "name" => "asdasdasd",
		    "description" => "asdawdwa",
		    "responsible_user" => 1,
		    "contact_user_id" => 1,
		    "project_id" => 1,
		    "is_group" => 1,
		    "percent" => 11
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
    }

}
