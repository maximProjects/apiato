<?php

namespace App\Containers\Accounting\Tests\Unit;

use App\Containers\Accounting\Tasks\GetUserHoursTask;
use App\Containers\Accounting\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class GetProjectHourUnitTest.
 *
 * @group accounting
 * @group unit
 */
class GetProjectHourUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            //'project_id' => 1,
            'date_start' => '2019-07-02',
            'date_end' => '2019-10-16',
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(GetUserHoursTask::class);
        $time = $action->run($transporter);

        // assert something here
        $this->assertEquals(true, true);

    }
}
