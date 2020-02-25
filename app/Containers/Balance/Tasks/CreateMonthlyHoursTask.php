<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\MonthlyHourRepository;
use App\Containers\Balance\Models\MonthlyHour;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMonthlyHoursTask extends Task
{

    protected $repository;

    public function __construct(MonthlyHourRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $monthlyHour = $this->repository->create($data);

            return $monthlyHour;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
