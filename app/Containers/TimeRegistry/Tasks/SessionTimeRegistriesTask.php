<?php

namespace App\Containers\TimeRegistry\Tasks;

use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Ship\Criterias\Eloquent\ThisEqualWhereIn;
class SessionTimeRegistriesTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        try {

            $user = Auth::user();

            $this->repository->pushCriteria(new ThisEqualThatCriteria('user_id', $user->id));

            $this->repository->pushCriteria(new ThisEqualWhereIn('state_id', [TimeRegistryState::Active, TimeRegistryState::OnHold, TimeRegistryState::Offline]));

            return $this->repository->first();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
