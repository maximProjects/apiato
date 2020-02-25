<?php

namespace App\Containers\Checklist\Tests\Unit;

use App\Containers\Checklist\Actions\CloneChecklistByIdAction;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CloneChecklistById.
 *
 * @group checklist
 * @group unit
 */
class CloneChecklistById extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $data = [
          "id" => 1,
        ];
        $transporter = new DataTransporter($data);
        $action = App::make(CloneChecklistByIdAction::class);
        $checklist = $action->run($transporter);
        // assert something here
        $this->assertInstanceOf(Checklist::class, $checklist);
        $this->assertEquals(true, true);
    }
}
