<?php

namespace App\Containers\Task\Tests\Unit;

use App\Containers\Comment\Actions\CreateCommentAction;
use App\Containers\Comment\Models\Comment;
use App\Containers\Job\Models\JobType;
use App\Containers\Message\Actions\CreateMessageAction;
use App\Containers\Message\Models\Message;
use App\Containers\Task\Actions\CreateTaskAction;
use App\Containers\Task\Models\Task;
use App\Containers\Task\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateTaskUnitTests.
 *
 * @group task
 * @group unit
 */
class CreateTaskUnitTests extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            'state_id' => 1,
            'price_per_hour_extra' => '21',
            'price_per_hour' => '18',
            'budget_planned' => '350',
            'date_end' => '2019-07-17',
            'date_start' => '2019-08-02',
            'description' => 'lorem lipsum rensporter1',
            'job_types' => [1],
            'duration' => ['05:30:00'],
            'qnt' => [3],

        ];
        $transporter = new DataTransporter($data);
        $action = App::make(CreateTaskAction::class);
        $task = $action->run($transporter);

        $this->assertInstanceOf(Task::class, $task);

        $this->assertEquals($task->price_per_hour, $data['price_per_hour']);

        $firstJobType = $task->jobTypes()->first();

        $this->assertInstanceOf(JobType::class, $firstJobType);



        // create and attach message

        $dataComment = [
            'content' => 'Lorem lipsum test content mail body lorem lipsum thisis',
        ];
        $transporterComment = new DataTransporter($dataComment);
        $actionMessage = App::make(CreateCommentAction::class);

        $comment = $actionMessage->run($transporterComment);

        $this->assertInstanceOf(Comment::class, $comment);

        $task->comments()->attach($comment);

        $attachedComment = $task->comments()->first();

        $this->assertInstanceOf(Comment::class, $attachedComment);

        //  dump($discrepancy->assignedTo);
        $this->assertEquals(true, true);


        // assert something here
        $this->assertEquals(true, true);

    }
}
