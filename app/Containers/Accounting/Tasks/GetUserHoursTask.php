<?php

namespace App\Containers\Accounting\Tasks;

use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisLessDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisMoreDatesCriteria;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;

class GetUserHoursTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($params)
    {
        if(isset($params['user_id'])) {
            $this->repository->pushCriteria(new ThisEqualThatCriteria('user_id', $params['user_id']));
        }

        if(isset($params['date_start'])) {
            $d = Carbon::createFromFormat('Y-m-d', $params['date_start']);
            $this->repository->pushCriteria(new ThisMoreDatesCriteria('date_start', $d));
        }

        if(isset($params['date_end'])) {
            $d = Carbon::createFromFormat('Y-m-d', $params['date_end']);
            $this->repository->pushCriteria(new ThisLessDatesCriteria('date_end', $d));
        }
        try {
            $seconds = 0;
             $rows =  $this->repository->all()->toArray();
             foreach ($rows as $item) {
                $dateStart = new Carbon($item['date_start']);
                $dateStop = new Carbon($item['date_end']);
                $dif = $dateStart->diffInSeconds($dateStop);
                $seconds = $seconds + $dif;
             }
            $time = gmdate('H:i:s', $seconds);
            return $time;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
