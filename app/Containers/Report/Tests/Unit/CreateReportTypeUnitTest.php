<?php

namespace App\Containers\Report\Tests\Unit;
use App\Containers\Report\Actions\CreateReportTypeAction;
use App\Containers\Report\Models\ReportType;
use App\Containers\Report\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateReportTypeUnitTest.
 *
 * @group report
 * @group unit
 */
class CreateReportTypeUnitTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            'name' => 'periodine'
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateReportTypeAction::class);
        $reportType = $action->run($transporter);
        $this->assertInstanceOf(ReportType::class, $reportType);

        // assert something here
        $this->assertEquals(true, true);
    }
}
