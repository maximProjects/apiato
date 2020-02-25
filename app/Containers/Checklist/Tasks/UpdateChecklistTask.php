<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Models\ChecklistState;
use App\Containers\Checklist\Models\ChecklistUserType;
use App\Containers\Checkpoint\Models\Checkpoint;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class UpdateChecklistTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $checklist = Checklist::find($id);

            if($checklist) {
                if($checklist->state_id == 0) {
                    $data["state_id"] = ChecklistState::New;
                }
            }

            $loc = App::getLocale();
            if(isset($data['name'])) {
                $data[$loc]['name'] = $data['name'];
                unset($data['name']);
            }
            if(isset($data['description'])) {
                $data[$loc]['description'] = $data['description'];
                unset($data['description']);
            }

            $node = $this->repository->update($data, $id);


            if(isset($data['parent_id']))
            {
                $parent = Checklist::find($data['parent_id']);
                if(!$parent || $data['parent_id'] == $id) {
                    $parent = null;
                }

            } else {
                    $parent = null;
            }
            $node->parent()->associate($parent)->save();


            if(isset($data['responsible_person'])) {

                $users = $data['responsible_person'];
                $node->user()->wherePivot('type', ChecklistUserType::Responsible)->detach();

                if($users && !is_array($users))
                    $users = [$users];

                if(!array_key_exists('0', $users) && !empty($users))
                    $users = [$users];

                foreach ($users as $key => $user) {
                    $node->user()->attach(is_numeric($user) ? $user : $user['id'], ['type' => ChecklistUserType::Responsible]);
                }
            }

//

            $delId = array();

            $checkpoints = $node->checkpoints()->get();

            if(isset($data['checkpoints'])) {

                if(is_array($data['checkpoints']))
                {
                    foreach ($data['checkpoints'] as $checkpoint) {

                        $checkpoint['checklist_id'] = $node->id;

                        if (! empty($checkpoint['id']) && isset($checkpoint['id'])) {
                            $delId[] = $checkpoint['id'];
                            $checkpointNew = Apiato::call('Checkpoint@UpdateCheckpointTask', [
                                $checkpoint['id'],
                                $checkpoint,
                            ]);
                        } else {
                            $checkpointNew = Apiato::call('Checkpoint@CreateCheckpointTask', [$checkpoint]);
                        }
                    }
                }
            }

            foreach($checkpoints as $checkpoint) {
                if(!in_array($checkpoint->id, $delId)) {
                    //$node->checkpoins()->detach($checkpoint->id);
                   // $d = Apiato::call('Checkpoint@DeleteCheckpointTask', [$checkpoint->id]);
                    $ck = Checkpoint::find($checkpoint->id);
                    $ck->delete();
                }
            }
//
//            $node->media()->detach();
//            if(isset($data['media'])&&count($data['media'])>0) {
//                $node->media()->sync($data['media']);
//            }
            $node->setPercent();

            return $node;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
