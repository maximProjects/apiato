<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Report\Data\Repositories\ReportRepository;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\DB;

class GetFinancialReportTask extends Task
{

    protected $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $where_query_params = [];

            if($data["date_start"]) {
                $where_query_params[] = ['date_start', '>=', $data["date_start"]];
            }

            if($data["date_end"]) {
                $where_query_params[] = ['date_end', '<=', $data["date_end"]];
            }
//
            $timeRegistres = DB::select(DB::raw('SELECT users.name as user_name, users.id as user_id, projects.name as project_name, projects.id as project_id, SUM(b.hours+b.extra_time) as time from balances b
                                                JOIN users ON users.id = b.user_id
                                                JOIN projects ON projects.id = b.project_id
                                                JOIN time_registry ON time_registry.id = b.time_registry_id
                                                group by b.user_id, b.project_id'));

            $results = [];

            foreach ($timeRegistres as $tm) {
                $projects = [];
                $projects[] = [
                    "project_id" => $tm->project_id,
                    "project_name" => $tm->project_name,
                    "time" => hoursMinutesFromSeconds($tm->time),
                ];
                if(!isset($results[$tm->user_id])) {
                    $results[$tm->user_id] = [
                        "user_id" => $tm->user_id,
                        "user_name" => $tm->user_name,
                        "total_time" => $tm->time,
                        "projects" => $projects
                    ];

                } else {
                    $results[$tm->user_id]["total_time"] = $results[$tm->user_id]["total_time"] + $tm->time;
                    $results[$tm->user_id]['projects'][] = $projects[0];
                }


            }
            foreach ($results as $key => $r) {
                $results[$key]["total_time"] = hoursMinutesFromSeconds($results[$key]["total_time"]);
            }



            return $results;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
