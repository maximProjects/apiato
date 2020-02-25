<?php

namespace App\Containers\Manager\Tests\Unit;

use App\Containers\Manager\Actions\CreateManagerAction;
use App\Containers\Manager\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateManagerUnitTest.
 *
 * @group manager
 * @group unit
 */
class CreateManagerUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object


//        "email",
//            "password",
//            "name",
//            "gender",
//            "birth"

        $data = [
             'email' => 'xxx@gmaiil.com',
             'password' => '543210',
             'name' => 'Xxx',
             'gender' => 'mail',
             'birth' => '1979-09-25',
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateManagerAction::class);
        $manager = $action->run($transporter);

        $this->assertEquals($manager->user->email, $data['email']);
        // assert something here
        $this->assertEquals(true, true);
    }
}
