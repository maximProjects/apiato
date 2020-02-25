<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateAddressAction extends Action
{
    public function run(DataTransporter $data)
    {
//        $data = $data->sanitizeInput([
//            "address_1",
//            "address_2",
//            "country_id",
//            "country_state_id",
//            "city",
//            "zip_code",
//            "location_lat",
//            "location_lng",
//            "first_name",
//            "last_name",
//            "contact_email",
//            "contact_phone",
//            "additional_information",
//        ]);


        $address = Apiato::call('Address@CreateAddressTask', [$data->toArray()]);

        return $address;
    }
}
