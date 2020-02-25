<?php

namespace App\Containers\Job\Models;

use App\Containers\Comment\Models\Comment;
use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Task\Models\Task;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Spatie\Tags\HasTags;

class Job extends Model
{
    use Translatable ,HasTags;

    public $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable = [
        'project_id',
        'project_group_id',
        'time_registry_id',
        'job_type_id',
        'description',
        'name',
        'date_start',
        'date_end',
        'length',
        'extra_time',
        'state_id',
        'task_id',
        'hourly_rate',
        'fixed_amount',
        'duration',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];



    public function sendDuration()
    {
        return date('Y-m-d H:i:s', $this->getTime());
    }

    public function getTime() {


        if(!$this->date_start || !$this->date_end)
        {
            $time = date('H:i:s', strtotime($this->duration));
            return strtotime($time);
        }

        if($this->length)
        {
            return $this->length;
        }
        $dateStart = new Carbon($this->date_start);
        $dateStop = new Carbon($this->date_end);
        $dif = $dateStart->diffInSeconds($dateStop);
        return $dif;
    }


    public function jobType() {
        return $this->belongsTo(JobType::class);
    }

    public function media() {
        return $this->morphToMany(Media::class,  'attachment')->withPivot('type_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function task()
    {
      return $this->belongsTo(Task::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'jobs';
    protected $table = "jobs";
}
