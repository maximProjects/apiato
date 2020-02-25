<?php

namespace App\Containers\TimeRegistry\Models;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Balance\Models\Balance;
use App\Containers\Comment\Models\Comment;
use App\Containers\Job\Models\Job;
use App\Containers\Job\Models\JobType;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Task\Models\Task;
use App\Containers\Timer\Models\TimerState;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use App\Containers\Media\Models\Media;
use Carbon\Carbon;
use App\Containers\Timer\Models\Timer;

/**
 * App\Containers\TimeRegistry\Models\TimeRegistry
 *
 * @mixin \Eloquent
 */
class TimeRegistry extends Model
{
    protected $fillable = [
        "user_id",
        "project_id",
        "project_group_id",
        "date_start",
        "date_end",
        "extra_time",
        "description",
        'latitude_start',
        'latitude_end',
        'longitude_start',
        'longitude_end',
        "location_end",
        "state_id",
        "type_id",
        "confirmed_hours"
    ];

    protected $appends = [
      'timer'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

//    public function jobs() {
//        return $this->hasMany(Job::class);
//    }

  public function getTimerAttribute() {
    $result = [];
    $result['total_time'] = $this->getTimerTotal();
    $result['timer_state'] = $this->getTimerActive();
    $timers = Timer::with(['task'])->where([['time_registry_id', '=', $this->id]])->get()->groupBy('task_id')->toArray();
    $result['tasks'] = [];

    foreach($timers as $item){
      if(!is_null($item[0]['task'])){
        $result['tasks'][] = [
          'id' => $item[0]['task']['id'],
          'timer' => [
            'timer_state' => $item[0]['task']['timer']['timer_state'],
            'total_time' => $item[0]['task']['timer']['total_time']
          ]

        ];
      }
    }
    return $result;
  }

    public function getTimerTotal() {
      $time = 0;
      $timers = Timer::where([['time_registry_id', '=', $this->id]])->get();
      foreach($timers as $t) {
        if($t->state_id != TimerState::Start) {
          if ($t->total_time) {
            $time = $time + $t->total_time;
          }
        } else {
          $endDate = Carbon::now();
          $dateStart = new Carbon($t->date_start);
          $total_time = $dateStart->diffInSeconds($endDate);
          $time = $time + $total_time;
        }
      }
      return $time;
    }

  public function getTimerActive() {
      $active = TimerState::Stop;
      $timersStartCount = Timer::where([['time_registry_id', '=', $this->id], ['state_id','=',TimerState::Start]])->count();
      if($timersStartCount > 0) {
        $active = TimerState::Start;
      }
    $timersHoldCount = Timer::where([['time_registry_id', '=', $this->id], ['state_id','=',TimerState::OnHold]])->count();
    if($timersHoldCount > 0) {
      $active = TimerState::OnHold;
    }

    return $active;
  }

    public function getTime() {
        $dateStart = new Carbon($this->date_start);
        $dateStop = new Carbon($this->date_end);
        $dif = $dateStart->diffInSeconds($dateStop);
        return $dif;
    }

    //TODO: move to Jobs
    public function jobTypes()
    {
        return $this->belongsToMany(JobType::class, 'jobs','time_registry_id', 'job_type_id')->withPivot('description', 'date_start', 'date_end');

    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function report()
    {
        $report = Apiato::call('Report@TimeRegistryReportTask', [$this]);
        return $report;
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function project()
    {
       return $this->belongsTo(Project::class);
    }

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class, 'time_registry_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }


    public function timers()
    {
      return $this->hasMany(Timer::class);
    }

    public function tasks()
    {
      return $this->belongsToMany(Task::class, 'time_registry_tasks', 'time_registry_id', 'task_id');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'time_registry';
    protected $table = 'time_registry';
}
