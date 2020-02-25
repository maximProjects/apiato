<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\UserRole;
use App\Ship\Criterias\Eloquent\OrderByFieldCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualOrNullThatCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisInThatCriteria;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Auth;
use Exception;

class GetAllTasksTask extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        try {
            $user = Auth::user();
            $userRoles = $user->roles()->pluck("name")->toArray();

            $uId = $user->id;

            if($user->hasRole(UserRole::Employee) && count(array_intersect(['admin', 'manager'], $userRoles)) == 0) {
 
                $this->repository->pushCriteria(new ThisEqualOrNullThatCriteria('user_id', $uId));
            }
            $tasks = $this->repository->paginate();
            return $tasks;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
