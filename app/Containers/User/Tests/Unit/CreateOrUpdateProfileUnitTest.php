<?php

namespace App\Containers\User\Tests\Unit;

use App\Containers\Profile\Models\Profile;
use App\Containers\User\Actions\FindUserByIdAction;
use App\Containers\User\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;
use App\Containers\User\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CreateOrUpdateProfileUnitTest.
 *
 * @group user
 * @group unit
 */
class CreateOrUpdateProfileUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            "id" => 1
        ];
        $transporterUser = new DataTransporter($data);
        $actionUser = App::make(FindUserByIdAction::class);
        $user = $actionUser->run($transporterUser);

        $this->assertInstanceOf(User::class, $user);

        // assert something here
        $this->assertEquals(true, true);

        $dataProfile = [
            "name" => "TestName",
            "last_name" => "TestLastName",
            "address" => "Jsinskio 8",
            "phone" => "+3704848748796",
            "email" => "maksim@nowo.lt",
            "notices" => "Lorem lipsum test text",
            "position" => "worker",
            "birthday" => "1990-12-21",
            "gender" => "male",
        ];
        $user->profile()->updateOrCreate($dataProfile);

        $profile = $user->profile()->first();

        $this->assertInstanceOf(Profile::class, $profile);

    }
}
