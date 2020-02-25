<?php

namespace App\Containers\Project\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ProjectFilterClientCriteria extends Criteria
{

    private $clientId;

    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('client_id', '=', $this->clientId);
    }
}
