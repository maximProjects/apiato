<?php

namespace App\Containers\Stripe\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class StripeAccountPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['create-stripeaccount', 'Create a stripeaccount.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-stripeaccount', 'Update a stripeaccount.']);
    }
}
