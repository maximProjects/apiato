<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Carbon;

class ConfirmHoursTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
          $timeRegistry = $this->repository->find($id);

          $time = 0;
          $extra_time = 0;
          $sum = 0;
          $balance_date = new Carbon($timeRegistry->date_start);

          foreach($timeRegistry->jobs()->get() as $job) {
            $time = $time + $job->getTime();
            $extra_time = $extra_time + $job->extra_time;

            if(!empty($job->fixed_ammount)) {
              $totalSum = $sum + $job->fixed_ammount;
            } else {
              $h = $job->getTime() / 3600;
              $sum = $sum + $h*$job->hourly_rate;
            }
          }


          $toBalance = [
            'time_registry_id' => $timeRegistry->id,
            'user_id' => $timeRegistry->user_id,
            'project_id' => $timeRegistry->project_id,
            'project_group_id' => $timeRegistry->project_group_id,
            'balance_date' => $balance_date,
            'hours' => 0,
            'extra_time' => 0,
            'sum' => 0
          ];



          if(isset($data['hours'])) {
            $toBalance['hours'] = $data['hours'];
          }

          if(isset($data['extra_time'])) {
            $toBalance['extra_time'] = $data['extra_time'];
          }

          if(isset($data['sum'])) {
            $toBalance['sum'] = $data['sum'];
          }

        // IF IS_VAL

            if(isset($data['is_val']) && $data['is_val'] )
            {

                $toBalance['is_val'] = $data['is_val'];
                $toBalance['hours'] = $time;
                $toBalance['extra_time'] = $extra_time;
                $toBalance['sum'] =  $sum;
            }


          if(isset($data['balance_date'])) {
            $toBalance['balance_date'] = new Carbon($data['balance_date']);
          }


          if(is_null($timeRegistry->balance)) {
            $balance = Apiato::call('Balance@CreateBalanceTask', [$toBalance]);
          } else {
            $balance = Apiato::call('Balance@UpdateBalanceTask', [$timeRegistry->balance->id, $toBalance]);
          }

          $timeRegistry->confirmed_hours = 1;
          $timeRegistry->save();

          return $timeRegistry;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

