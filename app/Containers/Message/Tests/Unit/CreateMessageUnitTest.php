<?php

namespace App\Containers\Message\Tests\Unit;

use App\Containers\Message\Actions\CreateMessageAction;
use App\Containers\Message\Models\Message;
use App\Containers\Message\Tests\TestCase;
use App\Containers\Message\UI\API\Requests\CreateMessageRequest;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateMessageUnitTest.
 *
 * @group message
 * @group unit
 */
class CreateMessageUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
                    'from' => 'maksim@nowo.lt',
                    'to' => 'maksj@gmail.com',
                    'cc' => 'mcc@gmail.com',
                    'subject' => 'test mail',
                    'content' => 'Lorem lipsum test content mail body lorem lipsum thisis',
                    'status' => 'send',
        ];




        $transporter = new DataTransporter($data);
        $action = App::make(CreateMessageAction::class);
        $message = $action->run($transporter);
        $this->assertInstanceOf(Message::class, $message);


        $this->assertEquals($message->from, 'maksim@nowo.lt');

        // assert something here
        $this->assertEquals(true, true);
    }
}
