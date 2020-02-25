<?php

namespace App\Containers\Address\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class AddressSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Address@SeedAddressTask', [[
            'address_1' => 'Jasinskio 8',
            'address_2' => 'Laisves pr. 45a',
            'city' => 'Vilnius'
        ]]);
    }
}
