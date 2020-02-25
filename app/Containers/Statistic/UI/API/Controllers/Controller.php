<?php

namespace App\Containers\Statistic\UI\API\Controllers;

use App\Containers\Project\UI\API\Transformers\ProjectTransformer;
use App\Containers\Statistic\UI\API\Requests\CreateStatisticRequest;
use App\Containers\Statistic\UI\API\Requests\DeleteStatisticRequest;
use App\Containers\Statistic\UI\API\Requests\GetAllStatisticsRequest;
use App\Containers\Statistic\UI\API\Requests\FindStatisticByIdRequest;
use App\Containers\Statistic\UI\API\Requests\UpdateStatisticRequest;
use App\Containers\Statistic\UI\API\Transformers\StatisticTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Statistic\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateStatisticRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createStatistic(CreateStatisticRequest $request)
    {
        $statistic = Apiato::call('Statistic@CreateStatisticAction', [$request]);

        return $this->created($this->transform($statistic, StatisticTransformer::class));
    }

    /**
     * @param FindStatisticByIdRequest $request
     * @return array
     */
    public function findStatisticById(FindStatisticByIdRequest $request)
    {

        $project = Apiato::call('Statistic@FindStatisticByIdAction', [$request]);

        return $this->transform($project, ProjectTransformer::class);
    }

    /**
     * @param GetAllStatisticsRequest $request
     * @return array
     */
    public function getAllStatistics(GetAllStatisticsRequest $request)
    {

        $statistics = Apiato::call('Statistic@GetAllStatisticsAction', [new DataTransporter($request)]);

      //  $result = new Collection($statistics);
        return $statistics;
     //   return $this->transform($result, ProjectTransformer::class);
        //return $this->transform($statistics, StatisticTransformer::class);
    }

    /**
     * @param UpdateStatisticRequest $request
     * @return array
     */
    public function updateStatistic(UpdateStatisticRequest $request)
    {
        $statistic = Apiato::call('Statistic@UpdateStatisticAction', [$request]);

        return $this->transform($statistic, StatisticTransformer::class);
    }

    /**
     * @param DeleteStatisticRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStatistic(DeleteStatisticRequest $request)
    {
        Apiato::call('Statistic@DeleteStatisticAction', [$request]);

        return $this->noContent();
    }
}
