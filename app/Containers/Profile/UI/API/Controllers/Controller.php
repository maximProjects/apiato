<?php

namespace App\Containers\Profile\UI\API\Controllers;

use App\Containers\Profile\Data\Transporters\ProfileTransporter;
use App\Containers\Profile\UI\API\Requests\CreateProfileRequest;
use App\Containers\Profile\UI\API\Requests\DeleteProfileRequest;
use App\Containers\Profile\UI\API\Requests\GetAllProfilesRequest;
use App\Containers\Profile\UI\API\Requests\FindProfileByIdRequest;
use App\Containers\Profile\UI\API\Requests\UpdateProfileRequest;
use App\Containers\Profile\UI\API\Transformers\ProfileTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Profile\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProfile(CreateProfileRequest $request)
    {
        $dataTransporter = new ProfileTransporter(
            array_merge($request->all(), [])
        );

        $dataArr = $dataTransporter->toArray();


        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $profiles = [];

        foreach ($dataArr as $key => $values) {
            $profiles[] = Apiato::transactionalCall('Profile@CreateProfileAction', [$values]);

        }
        $result = new Collection($profiles);

        return $this->created($this->transform($result, ProfileTransformer::class));
    }

    /**
     * @param FindProfileByIdRequest $request
     * @return array
     */
    public function findProfileById(FindProfileByIdRequest $request)
    {
        $profile = Apiato::call('Profile@FindProfileByIdAction', [$request]);

        return $this->transform($profile, ProfileTransformer::class);
    }

    /**
     * @param GetAllProfilesRequest $request
     * @return array
     */
    public function getAllProfiles(GetAllProfilesRequest $request)
    {
        $profiles = Apiato::call('Profile@GetAllProfilesAction', [$request]);

        return $this->transform($profiles, ProfileTransformer::class);
    }

    /**
     * @param UpdateProfileRequest $request
     * @return array
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $dataTransporter = new ProfileTransporter(
            array_merge($request->all(), [])
        );

        $profile = Apiato::call('Profile@UpdateProfileAction', [$dataTransporter]);

        return $this->transform($profile, ProfileTransformer::class);
    }

    /**
     * @param DeleteProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProfile(DeleteProfileRequest $request)
    {
        Apiato::call('Profile@DeleteProfileAction', [$request]);

        return $this->noContent();
    }
}
