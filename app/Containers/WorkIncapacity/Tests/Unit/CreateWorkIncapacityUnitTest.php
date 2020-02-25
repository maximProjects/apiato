<?php

namespace App\Containers\WorkIncapacity\Tests\Unit;

use App\Containers\WorkIncapacity\Actions\CreateWorkIncapacityAction;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Containers\WorkIncapacity\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/*
 * Class CreateWorkIncapacityUni1tTest.
 *
 * @group workincapacity
 * @group unit
 */
class CreateWorkIncapacityUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            'project_id' => null,
            'project_group_id' => null,
            'user_id' => 1,
            'type_id' => 1,
            'date_from' => '2019-07-17',
            'date_until' => '2019-07-37',
            'comment' => 'Text cpmment txt',
            'status' => 'send'
        ];


        $transporter = new DataTransporter($data);
        $action = App::make(CreateWorkIncapacityAction::class);
        $workIncap = $action->run($transporter);
        $this->assertInstanceOf(WorkIncapacity::class, $workIncap);


        $this->assertEquals($workIncap->date_from, '2019-07-17');

        $this->assertEquals(true, true);
    }
}
