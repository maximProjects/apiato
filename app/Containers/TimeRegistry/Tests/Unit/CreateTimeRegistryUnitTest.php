<?php

namespace App\Containers\TimeRegistry\Tests\Unit;

use App\Containers\Employee\Actions\CreateEmployeeAction;
use App\Containers\Employee\Models\Employee;
use App\Containers\Project\Actions\CreateProjectAction;
use App\Containers\Project\Models\Project;
use App\Containers\TimeRegistry\Actions\CreateTimeRegistryAction;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateTimeRegistryUnitTest.
 *
 * @group timeregistry
 * @group unit
 */
class CreateTimeRegistryUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $dataTimeRegistry = [
            'date_start' =>  '2019-07-30 00:00:00',
            'date_end' => '2019-08-31 00:00:00',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
            'state_id' => '1',
            'project_group_id' => null,
        ];

        // create a project


        $dataProject = [
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
            'is_large_scale' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
        ];

        $transporterProject = new DataTransporter($dataProject);
        $actionProject = App::make(CreateProjectAction::class);
        $project = $actionProject->run($transporterProject);

        $this->assertEquals($project->name, $dataProject['name']);

        $this->assertInstanceOf(Project::class, $project);

        // create employee

        $dataEmployee = [
            'email' => 'xxx8@gmaiil.com',
            'password' => '543210',
            'name' => 'Xxx',
            'gender' => 'mail',
            'birth' => '1979-09-25',
            'employee_code' => 'v4cdsd77da8f7',
        ];

        $transporterEmployee = new DataTransporter($dataEmployee);

        $actionEmployee = App::make(CreateEmployeeAction::class);

        $employee = $actionEmployee->run($transporterEmployee);

        $this->assertInstanceOf(Employee::class, $employee);

        $this->assertEquals($employee->user->email, $dataEmployee['email']);


        // finish TimeRegistry
        $dataTimeRegistry['project_id'] = $project->id;
        $dataTimeRegistry['user_id'] = $employee->id;


        $transporterTimeRegistry = new DataTransporter($dataTimeRegistry);
        $actionTimeRegistry = App::make(CreateTimeRegistryAction::class);
        $timeRegistry = $actionTimeRegistry->run($transporterTimeRegistry);

     //   dump($timeRegistry);
        $this->assertInstanceOf(TimeRegistry::class, $timeRegistry);

        $this->assertEquals($timeRegistry->project_id, $dataTimeRegistry['project_id']);

        // assert something here
        $this->assertEquals(true, true);
    }
}
