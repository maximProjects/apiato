<?php

namespace App\Containers\Job\Tests\Unit;

use App;
use App\Containers\Job\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use App\Containers\Job\Actions\CreateJobTypeAction;
use App\Containers\Job\Models\JobType;

/**
 * Class CreateJobTypeUnitTest.
 *
 * @group job
 * @group unit
 */
class CreateJobTypeUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            'name' => 'test name',
            'description' => 'test description'
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateJobTypeAction::class);
        $jobType = $action->run($transporter);

        $this->assertInstanceOf(JobType::class, $jobType);
        // assert something here
        $this->assertEquals(true, true);
    }
}
