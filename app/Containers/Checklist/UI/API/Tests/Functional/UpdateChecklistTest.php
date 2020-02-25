<?php

namespace App\Containers\Checklist\UI\API\Tests\Functional;

use App\Containers\Checklist\Tests\ApiTestCase;

/**
 * Class UpdateChecklist.
 *
 * @group checklist
 * @group api
 */
class UpdateChecklistTest extends ApiTestCase
{

    // the endpoint to be called within this test (e.g., get@v1/users)
    protected $endpoint = 'patch@v1/checklists/1';

    // fake some access rights
    protected $access = [
        'permissions' => 'update-checklists',
        'roles'       => '',
    ];


    /**
     * @test
     */
    public function test_()
    {
        $data = [
            "object" => "Checklist",
            "id" => 4,
            "status" => "1",
            "name" => "Checklist",
            "description" => "asdasdawdawdaw",
            "is_group" => 0,
            "is_template" => 0,
            "created_at" => 1569318644,
            "updated_at" => 1569318644,
            "responsible_person" => [],
            "contact_person" => [],
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }

}
