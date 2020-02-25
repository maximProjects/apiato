<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Criterias\AdminsCriteria;
use App\Containers\User\Data\Criterias\ClientsCriteria;
use App\Containers\User\Data\Criterias\RoleCriteria;
use App\Containers\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\Eloquent\OrderByCreationDateDescendingCriteria;
use App\Ship\Criterias\Eloquent\ThisRoleIdIsEqual;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;

/**
 * Class GetAllUsersTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetAllUsersTask extends Task
{

    /**
     * @var  \App\Containers\User\Data\Repositories\UserRepository
     */
    protected $repository;

    /**
     * GetAllUsersTask constructor.
     *
     * @param \App\Containers\User\Data\Repositories\UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params = [])
    {
        $user = Auth::user();
        $sID = $user->subscription()->first()->id;
        if(isset($params['role_id'])) {
            $this->repository->pushCriteria(new ThisRoleIdIsEqual($params['role_id']));
            //return $this->repository->whereHas('roles', function($q) use ($params) {$q->where('id','=', $params['role_id']);})->paginate();
        }

        return $this->repository->whereHas('subscriptions', function($q) use ($params, $sID) {$q->where('subscription_id','=', $sID);})->paginate();

       // return $this->repository->paginate();
    }

    public function clients()
    {
        $this->repository->pushCriteria(new ClientsCriteria());
    }

    public function admins()
    {
        $this->repository->pushCriteria(new AdminsCriteria());
    }

    public function ordered()
    {
        $this->repository->pushCriteria(new OrderByCreationDateDescendingCriteria());
    }

    public function withRole($roles)
    {
        $this->repository->pushCriteria(new RoleCriteria($roles));
    }

}
