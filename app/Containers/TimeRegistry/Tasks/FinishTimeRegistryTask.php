<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\TimeRegistry\Models\TimeRegistryState;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class FinishTimeRegistryTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $user = Auth::user();
            $dateEnd = Carbon::now();
            $timeRegistry = TimeRegistry::whereIn('state_id',  [TimeRegistryState::Active, TimeRegistryState::OnHold,TimeRegistryState::Offline])->where('user_id', $user->id)->first();
            if($timeRegistry && !isset($data['task_id'])) {
                $timeRegistry->update(['state_id' => TimeRegistryState::OnHold, 'date_end' => $dateEnd]);
            }
            $data['time_registry_id'] = $timeRegistry->id;
          Apiato::call('Timer@StopTimerTask', [$data]);
            return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
