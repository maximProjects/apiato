<?php

namespace App\Containers\WorkIncapacity\Tests\Unit;

use App\Containers\WorkIncapacity\Actions\CreateWorkIncapacityTypeAction;
use App\Containers\WorkIncapacity\Models\WorkIncapacityType;
use App\Containers\WorkIncapacity\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;


/**
 * Class WorkIncapacityUnitTest.
 *
 * @group workincapacity
 * @group unit
 */
class WorkIncapacityUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            'name' => 'Atostogos 3'
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateWorkIncapacityTypeAction::class);
        $workIncapType = $action->run($transporter);
        $this->assertInstanceOf(WorkIncapacityType::class, $workIncapType);

        // assert something here
        $this->assertEquals(true, true);
    }
}
