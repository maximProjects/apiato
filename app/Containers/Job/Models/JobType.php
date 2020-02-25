<?php

namespace App\Containers\Job\Models;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\Tags\HasTags;

class JobType extends Model
{

    use Translatable, HasTags;

    public $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable = [
        'type_id',
        'state_id',
        'user_id',
        'project_id',
        'planned_hours',
        'planned_quantity',
        'price_per_hour',
        'price_per_hour_extra',
        'description',
        'name',
        'is_template',
        'checklist_id',
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


    protected $appends = [

    ];

    public function getQntAttribute()
    {

       return $this->tasks;
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_job_types', 'job_type_id', 'task_id')->withPivot('duration', 'qnt');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }


    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'job_types';
    protected $table = 'job_types';
}
