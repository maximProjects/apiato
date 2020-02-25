<?php

namespace App\Containers\Location\UI\WEB\Controllers;

use App\Containers\Location\UI\WEB\Requests\CreateLocationRequest;
use App\Containers\Location\UI\WEB\Requests\DeleteLocationRequest;
use App\Containers\Location\UI\WEB\Requests\GetAllLocationsRequest;
use App\Containers\Location\UI\WEB\Requests\FindLocationByIdRequest;
use App\Containers\Location\UI\WEB\Requests\UpdateLocationRequest;
use App\Containers\Location\UI\WEB\Requests\StoreLocationRequest;
use App\Containers\Location\UI\WEB\Requests\EditLocationRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Location\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllLocationsRequest $request
     */
    public function index(GetAllLocationsRequest $request)
    {
        $locations = Apiato::call('Location@GetAllLocationsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindLocationByIdRequest $request
     */
    public function show(FindLocationByIdRequest $request)
    {
        $location = Apiato::call('Location@FindLocationByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateLocationRequest $request
     */
    public function create(CreateLocationRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreLocationRequest $request
     */
    public function store(StoreLocationRequest $request)
    {
        $location = Apiato::call('Location@CreateLocationAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditLocationRequest $request
     */
    public function edit(EditLocationRequest $request)
    {
        $location = Apiato::call('Location@GetLocationByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateLocationRequest $request
     */
    public function update(UpdateLocationRequest $request)
    {
        $location = Apiato::call('Location@UpdateLocationAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteLocationRequest $request
     */
    public function delete(DeleteLocationRequest $request)
    {
         $result = Apiato::call('Location@DeleteLocationAction', [$request]);

         // ..
    }
}
