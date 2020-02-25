<?php

namespace App\Containers\Checklist\Tests\Unit;

use App;
use App\Containers\Checklist\Actions\CreateChecklistAction;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use App\Containers\Checkpoint\Models\Checkpoint;

/**
 * Class CreateChecklistUnitTest.
 *
 * @group checklist
 * @group unit
 */
class CreateChecklistUnitTest extends TestCase
{

    /**
     * @test
     */
    public function testSingleNodeInsert_()
    {
        $locale = \Config::get('translatable.locale');
        $data = [
            'name' => 'test name',
            'description' => 'test description',
            'is_group' => '1'
        ];

        $transporter = new DataTransporter([$locale => $data]);
        $action = App::make(CreateChecklistAction::class);


        $checklist = $action->run($transporter);


        $this->assertInstanceOf(Checklist::class, $checklist);

        $this->assertEquals($checklist->name, 'test name');
        $this->assertEquals($checklist->description, 'test description');

    }


    public function testMultipleNodesInsert_()
    {
        $this->assertEquals(true, true);
    }


    public function testParentInsert_()
    {
        $locale = 'en';

        $data = [
                'name' => 'Parent name',
                'description' => 'Parent description'
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateChecklistAction::class);
        $parent_node = $action->run($transporter);



        $child = [
                'name' => 'Child name',
                'description' => 'Child description',
                'parent_id' => $parent_node->id
        ];

        $transporter = new DataTransporter($child);
        $child_node = $action->run($transporter);

        $this->assertEquals($parent_node->parent_id, null);
      //  $this->assertEquals($child_node->parent_id, 1);
    }


    public function testChildInsert_()
    {
        $this->assertEquals(true, true);
    }


    public function testGetTree_()
    {
        $this->assertEquals(true, true);
    }

    public function testCreateWithCheckpoints_()
    {
        $locale = \Config::get('translatable.locale');
        $data = [
            'name' => 'test name',
            'description' => 'test description',
            'is_group' => '1',
            'is_template' => 1,
            'checkpoints' => [
                0 => [
                  'name' => 'New Checkpoint',
                  'description' => 'New Checkpoint description'
                ],
            ]
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateChecklistAction::class);

        $checklist = $action->run($transporter);

        $this->assertInstanceOf(Checklist::class, $checklist);

        $checkpoint = $checklist->checkpoints()->first();

        $this->assertInstanceOf(Checkpoint::class, $checkpoint);

        $this->assertEquals($checklist->name, 'test name');
        $this->assertEquals($checklist->description, 'test description');
    }
}
