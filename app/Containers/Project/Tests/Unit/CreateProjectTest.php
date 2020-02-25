<?php

namespace App\Containers\Project\Tests\Unit;

use App\Containers\Project\Actions\CreateProjectAction;
use App\Containers\Project\Data\Transporters\ProjectTransporter;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateProjectTest.
 *
 * @group project
 * @group unit
 */
class CreateProjectTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            // 'key' => 'value',
            'name' => 'Test project 25',
            'state_id' => '1',
            'client_id' => '1',
            'address_id' => '1',
            'date_start' => '2019-06-30 00:00:00',
            'date_end' => '2019-08-31 00:00:00',
            'working_hours_from' => '10:00:00',
            'working_hours_to' => '20:00:00',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
        ];

        //$transporter = new ProjectTransporter($data);
        $action = App::make(CreateProjectAction::class);
        $project = $action->run($data);

        $this->assertInstanceOf(Project::class, $project);

        $this->assertEquals($project->name, $data["name"]);

        // assert something here
        $this->assertEquals(true, true);
    }
}
