<?php

namespace App\Containers\Comment\Tests\Unit;

use App\Containers\Comment\Models\Comment;
use App\Containers\Comment\Tests\TestCase;
use App\Containers\Comment\Actions\CreateCommentAction;
use App\Containers\Message\Models\Message;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateCommentUnitTest.
 *
 * @group comment
 * @group unit
 */
class CreateCommentUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        $data = [
            'content' => 'Lorem lipsum test content mail body lorem lipsum thisis',
        ];




        $transporter = new DataTransporter($data);
        $action = App::make(CreateCommentAction::class);
        $comment = $action->run($transporter);
        $this->assertInstanceOf(Comment::class, $comment);

        // assert something here
        $this->assertEquals(true, true);
    }
}
