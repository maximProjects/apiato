<?php

namespace App\Containers\Confirmation\UI\API\Controllers;

use App\Containers\Confirmation\UI\API\Requests\CreateConfirmationRequest;
use App\Containers\Confirmation\UI\API\Requests\DeleteConfirmationRequest;
use App\Containers\Confirmation\UI\API\Requests\GetAllConfirmationsRequest;
use App\Containers\Confirmation\UI\API\Requests\FindConfirmationByIdRequest;
use App\Containers\Confirmation\UI\API\Requests\UpdateConfirmationRequest;
use App\Containers\Confirmation\UI\API\Transformers\ConfirmationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Confirmation\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateConfirmationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createConfirmation(CreateConfirmationRequest $request)
    {
        $confirmation = Apiato::call('Confirmation@CreateConfirmationAction', [$request]);

        return $this->created($this->transform($confirmation, ConfirmationTransformer::class));
    }

    /**
     * @param FindConfirmationByIdRequest $request
     * @return array
     */
    public function findConfirmationById(FindConfirmationByIdRequest $request)
    {
        $confirmation = Apiato::call('Confirmation@FindConfirmationByIdAction', [$request]);

        return $this->transform($confirmation, ConfirmationTransformer::class);
    }

    /**
     * @param GetAllConfirmationsRequest $request
     * @return array
     */
    public function getAllConfirmations(GetAllConfirmationsRequest $request)
    {
        $confirmations = Apiato::call('Confirmation@GetAllConfirmationsAction', [$request]);

        return $this->transform($confirmations, ConfirmationTransformer::class);
    }

    /**
     * @param UpdateConfirmationRequest $request
     * @return array
     */
    public function updateConfirmation(UpdateConfirmationRequest $request)
    {
        $confirmation = Apiato::call('Confirmation@UpdateConfirmationAction', [$request]);

        return $this->transform($confirmation, ConfirmationTransformer::class);
    }

    /**
     * @param DeleteConfirmationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteConfirmation(DeleteConfirmationRequest $request)
    {
        Apiato::call('Confirmation@DeleteConfirmationAction', [$request]);

        return $this->noContent();
    }
}
