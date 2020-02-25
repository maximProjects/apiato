<?php

namespace App\Containers\Profile\Tests\Unit;

use App\Containers\Profile\Actions\CreateProfileAction;
use App\Containers\Profile\Models\Profile;
use App\Containers\Profile\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateProfileUnitTest.
 *
 * @group profile
 * @group unit
 */
class CreateProfileUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            "user_id" => 1,
            "first_name" => "TestName",
            "last_name" => "TestLastName",
            "address" => "Jsinskio 8",
            "phone" => "+3704848748796",
            "email" => "maksim@nowo.lt",
            "notices" => "Lorem lipsum test text",
            "position" => "worker",
            "birthday" => "1990-12-21",
            "gender" => "male",
        ];
        $transporter = new DataTransporter($data);
        $action = App::make(CreateProfileAction::class);
        $profile = $action->run($transporter);
        $this->assertInstanceOf(Profile::class, $profile);
        // assert something here
        $this->assertEquals(true, true);
    }
}
