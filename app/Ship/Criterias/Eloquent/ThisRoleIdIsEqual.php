<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ThisRoleIdIsEqual
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ThisRoleIdIsEqual extends Criteria
{

    /**
     * @var
     */
    private $field;

    /**
     * ThisFieldCriteria constructor.
     *
     * @param $role_id
     */
    public function __construct($role_id)
    {
        $this->role_id = $role_id;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return  mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        $role_id = $this->role_id;
        return $model->whereHas('roles', function($q) use ($role_id) {$q->where('id','=', $role_id);});
    }

}
