<?php

namespace App\Containers\Wepay\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class WepayAccountPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-wepayaccounts', 'Find a wepayaccounts in the DB.']);
    }
}
