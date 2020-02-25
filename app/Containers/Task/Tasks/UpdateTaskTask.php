<?php

namespace App\Containers\Task\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Containers\Task\Models\TaskState;
use App\Containers\Task\Models\TaskUserType;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTaskTask extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $task = \App\Containers\Task\Models\Task::find($id);
            if(!isset($data['state_id'])) {


                if($task) {
                    if($task->state_id == 0) {

                        $data['state_id'] = TaskState::New;
                    }
                }
            }

            $task = $this->repository->update($data, $id);


            if(isset($data['job_types'])) {

                $task->jobTypes()->detach();

                $job_types = Apiato::call('Settings@FormatRelationArrayTask', [$data['job_types']]);

                foreach ($job_types as $job_type) {

                    $pivotFields = [];
                    if(isset($job_type['duration']) && !empty($job_type['duration'])) {
                        $pivotFields['duration'] = $job_type['duration'];
                    }

                    if(isset($job_type['qnt']) && !empty($job_type['qnt'])) {
                        $pivotFields['qnt'] = $job_type['qnt'];
                    }

                    if(isset($job_type['use_checklist']) && !empty($job_type['use_checklist'])) {
                        $pivotFields['use_checklist'] = $job_type['use_checklist'];
                    }

                    $task->jobTypes()->attach(is_numeric($job_type) ? $job_type : $job_type['id'], $pivotFields);

                }
            }

            if(isset($data['responsible_person'])) {

                $users = $data['responsible_person'];
                $task->user()->wherePivot('type', TaskUserType::Responsible)->detach();

                if($users && !is_array($users))
                    $users = [$users];

                if(!array_key_exists('0', $users) && !empty($users))
                    $users = [$users];

                foreach ($users as $key => $user) {
                    $task->user()->attach(is_numeric($user) ? $user : $user['id'], ['type' => TaskUserType::Responsible]);
                }
            }


            if(isset($data['contact_person'])) {

                $users = $data['contact_person'];
                $task->user()->wherePivot('type', TaskUserType::Contact)->detach();

                if($users && !is_array($users))
                    $users = [$users];

                if(!array_key_exists('0', $users) && !empty($users))
                    $users = [$users];

                foreach ($users as $key => $user) {
                    $task->user()->attach(is_numeric($user) ? $user : $user['id'], ['type' => TaskUserType::Contact]);
                }
            }

            return $task;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
