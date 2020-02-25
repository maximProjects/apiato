<?php

namespace App\Containers\Expense\Tests\Unit;

use App\Containers\Expense\Actions\CreateExpenseAction;
use App\Containers\Expense\Models\Expense;
use App\Containers\Expense\Tests\TestCase;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Support\Facades\App;

/**
 * Class CreateExpenseTest.
 *
 * @group expense
 * @group unit
 */
class CreateExpenseTest extends TestCase
{

    /**
     * @test
     */
    public function test_()
    {
        // create a data object
        $data = [
            "project_id" => null,
        "project_group_id" => null,
        "employee_id" => null,
        "manager_id" => null,
        "supplier_name" => "Vardenis Pavardenis",
        "type" => "Fuel",
        "document_type" => "Fakture",
        "number" => "12345",
        "extra" => "10.00",
        "date" => "2019-08-31",
        "vat" => "12",
        "total" => "5.00",
        "total_with_vat" => "5.00",
        "comment" => "Lorem ipsum descriptio lLorem ipsum descriptio",
        "status" => "neapmoketa",
        "tenant_id" => null
        ];

        $transporter = new DataTransporter($data);
        $action = App::make(CreateExpenseAction::class);
        $expense = $action->run($transporter);
        $this->assertInstanceOf(Expense::class, $expense);

        $this->assertEquals($expense->supplier_name, 'Vardenis Pavardenis');
        // assert something here
        $this->assertEquals(true, true);
    }
}
