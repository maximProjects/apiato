<?php

namespace App\Containers\Balance\Tasks;

use App\Containers\Balance\Data\Repositories\MonthlyBalanceRepository;
use App\Containers\Balance\Models\MonthlyBalance;
use App\Containers\Balance\Models\MonthlyHour;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateMonthlyBalanceTask extends Task
{

    protected $repository;

    public function __construct(MonthlyBalanceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $monthlyHour = MonthlyHour::find($data['monthly_hours_id']);

            if(is_null($monthlyHour->monthBalance)){
                $data =
                    [
                        'monthly_hour_id' => $monthlyHour->id,
                        'user_id' => $data['user_id']
                    ];

                $monthlyBalance = $this->repository->create($data);

                return $monthlyBalance;
            } else {
                return false;
            }

        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
