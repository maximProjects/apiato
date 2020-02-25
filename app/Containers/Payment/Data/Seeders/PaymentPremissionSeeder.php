<?php

namespace App\Containers\Payment\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class PaymentPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-payments', 'Find a payments in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['search-paymentdetails', 'Find a paymentdetails in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-payments', 'Get All payments.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-payments', 'Create a payment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-payments', 'Update a payment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-payments', 'Delete a payment.']);
    }
}
