<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateAddressAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            "address_1",
            "address_2",
            "country_id",
            "country_state_id",
            "city",
            "zip_code",
            "location_lat",
            "location_lng",
            "first_name",
            "last_name",
            "contact_email",
            "contact_phone",
            "additional_information",
        ]);

        $address = Apiato::call('Address@UpdateAddressTask', [$request->id, $data]);

        return $address;
    }
}
