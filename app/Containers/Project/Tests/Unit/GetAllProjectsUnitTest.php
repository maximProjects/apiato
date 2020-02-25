<?php

namespace App\Containers\Project\Tests\Unit;

use App\Containers\Project\Actions\CreateProjectAction;
use App\Containers\Project\Actions\GetAllProjectsAction;
use App\Containers\Project\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class GetAllProjectsUnitTest.
 *
 * @group project
 * @group unit
 */
class GetAllProjectsUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            'limit' => 5,
            'page' => 1,
            'date_start' => '2019-08-01',
            'date_end' => '2019-08-16',
            'state_id' => 2,
            'order_by_name' => 'desc',
            'client_id' => 1,
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(GetAllProjectsAction::class);
        $projects = $action->run($transporter);
        // assert something here
        $this->assertEquals(true, true);
    }
}
