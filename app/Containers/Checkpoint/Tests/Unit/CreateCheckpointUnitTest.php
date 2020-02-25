<?php

namespace App\Containers\Checkpoint\Tests\Unit;

use App;
use App\Containers\Checklist\Actions\CreateChecklistAction;
use App\Containers\Checkpoint\Actions\CreateCheckpointAction;
use App\Containers\Checkpoint\Tests\TestCase;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checkpoint\Models\Checkpoint;

use App\Ship\Transporters\DataTransporter;

/**
 * Class CreateCheckpointUnitTest.
 *
 * @group checkpoint
 * @group unit
 */
class CreateCheckpointUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $locale = \Config::get('translatable.locale');

        $data = [
            'name' => 'Parent name',
            'description' => 'Parent description'
        ];

        $transporter = new DataTransporter([$locale => $data]);
        $action = App::make(CreateChecklistAction::class);
        $parent_node = $action->run($transporter);






        $data_checkpoint = [
            'name' => 'New Checkpoint',
            'description' => 'New checkpoint sescription'
        ];

        $transporter = new DataTransporter([$locale => $data_checkpoint]);
        $action = App::make(CreateCheckpointAction::class);
        $checkpoint = $action->run($transporter);

        $parent_node->checkpoints()->save($checkpoint);

        $this->assertInstanceOf(Checkpoint::class, $checkpoint);
        $this->assertEquals($parent_node->parent_id, null);

    }
}
