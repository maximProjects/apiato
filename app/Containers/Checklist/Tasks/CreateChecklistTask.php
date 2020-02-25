<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checklist\Models\ChecklistState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\Task\Models\TaskUserType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CreateChecklistTask extends Task
{
    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $loc = App::getLocale();
            if(isset($data['name'])) {
                $data[$loc]['name'] = $data['name'];
                unset($data['name']);
            }
            if(isset($data['description'])) {
                $data[$loc]['description'] = $data['description'];
                unset($data['description']);
            }
            $parent = null;
            if (isset($data['parent_id'])) {
                $parent = Checklist::find($data['parent_id']);
            }

            $node = null;

            if(isset($data['state_id']) && $data['state_id'] == 0) {
            $user = Auth::user();
            $node = Checklist::where([['state_id', '=', ChecklistState::Draft], ['created_by', '=', $user->id]])->first();
            if($node) {
                $node->update($data);
            }
            $is_template = 1;
            if(!$node) {
                $node = $this->repository->create($data, $parent);
            }
           } else {
                //die('create normal');
                $node = $this->repository->create($data, $parent);
            }


            if(isset($data['responsible_person'])) {

                $node->user()->wherePivot('type', TaskUserType::Responsible)->detach();

                $users = Apiato::call('Settings@FormatRelationArrayTask', [$data['responsible_person']]);

                foreach ($users as $key => $user) {
                    $node->user()->attach(is_numeric($user) ? $user : $user['id'], ['type' => TaskUserType::Responsible]);
                }
            }

            if(isset($data['contact_person'])) {

                $node->user()->wherePivot('type', TaskUserType::Contact)->detach();

                $users = Apiato::call('Settings@FormatRelationArrayTask', [$data['contact_person']]);

                foreach ($users as $key => $user) {
                    $node->user()->attach(is_numeric($user) ? $user : $user['id'], ['type' => TaskUserType::Contact]);
                }
            }


            if (isset($data['checkpoints'])) {

                if(!array_key_exists('0', $data['checkpoints']) && !empty($data['checkpoints']))
                    $data['checkpoints'] = [$data['checkpoints']];


                foreach ($data['checkpoints'] as $checkpoint) {
                    $checkpoint['checklist_id'] = $node->id;
                    Apiato::call('Checkpoint@CreateCheckpointTask', [$checkpoint]);
                }
            }

            $node->setPercent();

            return $node;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
