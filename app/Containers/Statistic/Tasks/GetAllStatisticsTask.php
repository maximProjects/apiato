<?php

namespace App\Containers\Statistic\Tasks;

use App\Containers\Balance\Data\Repositories\BalanceRepository;
use App\Containers\Balance\Data\Repositories\MonthlyHourRepository;
use App\Containers\Balance\Models\MonthlyHour;
use App\Containers\Project\Data\Criterias\ProjectFilterDateStartCriteria;
use App\Containers\Project\Models\Project;
use App\Containers\Project\UI\API\Transformers\ProjectTransformer;
use App\Containers\Statistic\Data\Repositories\StatisticRepository;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Criterias\Eloquent\ThisLessDatesCriteria;
use App\Ship\Criterias\Eloquent\ThisMoreDatesCriteria;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Carbon;

class GetAllStatisticsTask extends Task
{

    protected $repository;

    public function __construct(StatisticRepository $repository, TimeRegistryRepository $timeRegistryRepository, BalanceRepository $balanceRepository)
    {
        $this->repository = $repository;
        $this->timeRegistryRep = $timeRegistryRepository;
        $this->balanceRep = $balanceRepository;
    }

    public function run($params)
    {
        $statistic = [];
        $statistic['time_by_project'] = [];

        //get TimeRegistries

        if(isset($params['date_start'])) {
            $this->balanceRep->pushCriteria(new ThisMoreDatesCriteria('balance_date', new Carbon($params['date_start'])));
        }

        if(isset($params['date_end'])) {
            $this->balanceRep->pushCriteria(new ThisLessDatesCriteria('balance_date', new Carbon($params['date_end'])));
        }
        $balances = $this->balanceRep->get();

        foreach($balances as $i => $tm) {
            if($tm->project_id) {
                $projectData = $tm->project->report();
                $statistic['time_by_project'][$i]['name'] = $tm->project->name;
                $statistic['time_by_project'][$i]['hours'] = $tm['hours'];
                $statistic['time_by_project'][$i]['extra_time'] = $tm['extra_time'];
                $statistic['time_by_project'][$i]['sum'] = $tm['sum'];
            }
        }

        $result = $statistic;

        return $result;
    }
}
