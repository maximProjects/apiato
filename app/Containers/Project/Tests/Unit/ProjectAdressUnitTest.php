<?php

namespace App\Containers\Project\Tests\Unit;

use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Containers\Address\Tasks\FindAddressByIdTask;
use App\Containers\Project\Actions\CreateProjectAction;
use App\Containers\Project\Models\Project;
use App\Containers\Address\Models\Address;
use App\Containers\Project\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use App\Containers\Address\Actions\CreateAddressAction;
use Illuminate\Support\Facades\App;

/**
 * Class ProjectAdressUnitTest.
 *
 * @group project
 * @group unit
 */
class ProjectAdressUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
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
            'addresses' => [
                0 => [
                    'address_1' => 'Jasisnskio 8',
                    'address_2' => 'Laisves 123',
                    'city' => 'Vilnius'
                ]
            ]
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateProjectAction::class);
        $project = $action->run($transporter->toArray());

        $this->assertInstanceOf(Project::class, $project);

        //FindAddressByIdTask

//        $dataAddress = [
//            'address_1' => 'Jasinskio 8',
//            'address_2' => 'Laisves pr. 45a',
//            'city' => 'Vilnius'
//        ];
//        $transporterAddress = new DataTransporter($dataAddress);
//        $actionAddress = App::make(CreateAddressAction::class);
//        $address = $actionAddress->run($transporterAddress);
//
//
//        $project->addresses()->attach($address);

        $this->assertInstanceOf(Address::class, $project->addresses()->first());

        //dump($project->address()->first()->id);



        // assert something here
        $this->assertEquals(true, true);
    }
}
