<?php

namespace App\Containers\Company\Tasks;

use App\Containers\Company\Data\Repositories\CompanyRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCompaniesTask extends Task
{

    protected $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
