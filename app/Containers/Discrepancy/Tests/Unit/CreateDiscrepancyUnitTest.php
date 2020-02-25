<?php

namespace App\Containers\Discrepancy\Tests\Unit;

use App\Containers\Comment\Actions\CreateCommentAction;
use App\Containers\Comment\Models\Comment;
use App\Containers\Discrepancy\Actions\CreateDiscrepancyAction;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Discrepancy\Tests\TestCase;
use App\Containers\Message\Models\Message;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;
use App\Containers\Message\Actions\CreateMessageAction;

/**
 * Class CreateDiscrepancyUnitTest.
 *
 * @group discrepancy
 * @group unit
 */
class CreateDiscrepancyUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            'price_per_hour_extra' => '21',
            'price_per_hour' => '18',
            'budget_planned' => '350',
            'date_end' => '2019-07-17',
            'date_start' => '2019-08-02',
            'description' => 'lorem lipsum rensporter1',
            'created_by' => [1,2],
            'assigned_to' => [1,2],
        ];
        $transporter = new DataTransporter($data);
        $action = App::make(CreateDiscrepancyAction::class);
        $discrepancy = $action->run($transporter);
        $this->assertInstanceOf(Discrepancy::class, $discrepancy);

        // create and attach comment

        $dataComment = [
            'content' => 'Lorem lipsum test content mail body lorem lipsum thisis',
        ];
        $transporterComment = new DataTransporter($dataComment);
        $actionComment = App::make(CreateCommentAction::class);

        $comment = $actionComment->run($transporterComment);

        $this->assertInstanceOf(Comment::class, $comment);

        $discrepancy->comments()->attach($comment);

        $attachedComment = $discrepancy->comments()->first();

        $this->assertInstanceOf(Comment::class, $attachedComment);

      //  dump($discrepancy->assignedTo);
        $this->assertEquals(true, true);
    }
}
