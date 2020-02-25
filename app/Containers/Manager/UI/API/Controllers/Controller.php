<?php

namespace App\Containers\Manager\UI\API\Controllers;

use App\Containers\Manager\UI\API\Requests\CreateManagerRequest;
use App\Containers\Manager\UI\API\Requests\DeleteManagerRequest;
use App\Containers\Manager\UI\API\Requests\GetAllManagersRequest;
use App\Containers\Manager\UI\API\Requests\FindManagerByIdRequest;
use App\Containers\Manager\UI\API\Requests\UpdateManagerRequest;
use App\Containers\Manager\UI\API\Transformers\ManagerTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Controller
 *
 * @package App\Containers\Manager\UI\API\Controllers
 */
class  Controller extends ApiController
{
    /**
     * @param CreateManagerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createManager(CreateManagerRequest $request)
    {
        $manager = Apiato::call('Manager@CreateManagerAction', [new DataTransporter($request)]);

        return $this->created($this->transform($manager, ManagerTransformer::class));
    }

    /**
     * @param FindManagerByIdRequest $request
     * @return array
     */
    public function findManagerById(FindManagerByIdRequest $request)
    {
        $manager = Apiato::call('Manager@FindManagerByIdAction', [$request]);

        return $this->transform($manager, ManagerTransformer::class);
    }

    /**
     * @param GetAllManagersRequest $request
     * @return array
     */
    public function getAllManagers(GetAllManagersRequest $request)
    {
        $managers = Apiato::call('Manager@GetAllManagersAction', [$request]);

        return $this->transform($managers, ManagerTransformer::class);
    }

    /**
     * @param UpdateManagerRequest $request
     * @return array
     */
    public function updateManager(UpdateManagerRequest $request)
    {
        $manager = Apiato::call('Manager@UpdateManagerAction', [$request]);

        return $this->transform($manager, ManagerTransformer::class);
    }

    /**
     * @param DeleteManagerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteManager(DeleteManagerRequest $request)
    {
        Apiato::call('Manager@DeleteManagerAction', [$request]);

        return $this->noContent();
    }
}
