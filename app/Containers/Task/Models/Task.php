<?php

namespace App\Containers\Task\Models;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Comment\Models\Comment;
use App\Containers\Job\Models\JobType;
use App\Containers\Project\Models\Project;
use App\Containers\Timer\Models\Timer;
use App\Containers\Timer\Models\TimerState;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use App\Containers\Media\Models\Media;
use Carbon\Carbon;
use Spatie\ModelStatus\HasStatuses;

/**
 * App\Containers\Task\Models\Task
 *
 * @property int $id
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property float $budget_planned
 * @property float $price_per_hour
 * @property float $price_per_hour_extra
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $project_id
 * @property int|null $manager_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereBudgetPlanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task wherePricePerHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task wherePricePerHourExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Task\Models\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasStatuses;
    protected $fillable = [
        'project_id',
        'project_group_id',
        'state_id',
        'user_id',
        'price_per_hour_extra',
        'price_per_hour',
        'budget_planned',
        'date_end',
        'date_start',
        'description',
        'priority'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

  protected $appends = [
    'timer'
  ];

  public function getTimerAttribute() {
    $result = [];
    $result['total_time'] = $this->getTimerTotal();
    $result['timer_state'] = $this->getTimerActive();
    return $result;
  }

  public function getTimerTotal() {
    $time = 0;
    $timers = Timer::where([['task_id', '=', $this->id]])->get();
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
    $timersStartCount = Timer::where([['task_id', '=', $this->id], ['state_id','=',TimerState::Start]])->count();
    if($timersStartCount > 0) {
      $active = TimerState::Start;
    }
    $timersHoldCount = Timer::where([['task_id', '=', $this->id], ['state_id','=',TimerState::OnHold]])->count();
    if($timersHoldCount > 0) {
      $active = TimerState::OnHold;
    }

    return $active;
  }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'task_users','task_id', 'user_id')->withPivot('type');

    }

    public function jobTypes()
    {
        return $this->belongsToMany(JobType::class, 'task_job_types','task_id', 'job_type_id')->withPivot('duration', 'qnt', 'use_checklist');
    }

    public function checklists()
    {
      return $this->belongsToMany(Checklist::class, 'task_checklists', 'task_id', 'checklist_id');
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function timeRegistries()
    {
        return $this->belongsToMany(TimeRegistry::class, 'task_id', 'time_registry_id');
    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'tasks';
}
