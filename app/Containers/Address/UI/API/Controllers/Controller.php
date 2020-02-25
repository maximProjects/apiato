<?php

namespace App\Containers\Address\UI\API\Controllers;

use App\Containers\Address\UI\API\Requests\CreateAddressRequest;
use App\Containers\Address\UI\API\Requests\DeleteAddressRequest;
use App\Containers\Address\UI\API\Requests\GetAllAddressesRequest;
use App\Containers\Address\UI\API\Requests\FindAddressByIdRequest;
use App\Containers\Address\UI\API\Requests\UpdateAddressRequest;
use App\Containers\Address\UI\API\Transformers\AddressTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Controller
 *
 * @package App\Containers\Address\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAddress(CreateAddressRequest $request)
    {
        $address = Apiato::call('Address@CreateAddressAction',  [new DataTransporter($request)]);

        return $this->created($this->transform($address, AddressTransformer::class));
    }

    /**
     * @param FindAddressByIdRequest $request
     * @return array
     */
    public function findAddressById(FindAddressByIdRequest $request)
    {
        $address = Apiato::call('Address@FindAddressByIdAction', [$request]);

        return $this->transform($address, AddressTransformer::class);
    }

    /**
     * @param GetAllAddressesRequest $request
     * @return array
     */
    public function getAllAddresses(GetAllAddressesRequest $request)
    {
        $addresses = Apiato::call('Address@GetAllAddressesAction', [$request]);

        return $this->transform($addresses, AddressTransformer::class);
    }

    /**
     * @param UpdateAddressRequest $request
     * @return array
     */
    public function updateAddress(UpdateAddressRequest $request)
    {
        $address = Apiato::call('Address@UpdateAddressAction', [$request]);

        return $this->transform($address, AddressTransformer::class);
    }

    /**
     * @param DeleteAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAddress(DeleteAddressRequest $request)
    {
        Apiato::call('Address@DeleteAddressAction', [$request]);

        return $this->noContent();
    }
}
