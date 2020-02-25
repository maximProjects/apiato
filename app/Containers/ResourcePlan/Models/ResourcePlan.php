<?php

namespace App\Containers\ResourcePlan\Models;

use App\Containers\Schedule\Models\Schedule;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;
use App\Containers\Project\Models\Project;
use Illuminate\Support\Carbon;

class ResourcePlan extends Model
{
    protected $fillable = [
        'project_id',
        'date_start',
        'date_end',
        'number_employees_required',
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

    public function  project()
    {
        return $this->belongsTo(Project::class);
    }

    public function  getAssignedUsers()
    {
        $assigned = Schedule::where([
            ['date_start', '>=', new Carbon($this->date_start)],
            ['date_end', '<=', new Carbon($this->date_end)],
            ['scheduleable_id', '=', $this->project_id]
        ])->count();
        return $assigned;
    }

    public function  getUnavailable()
    {
        $unavailable = Schedule::where([
            ['date_start', '>=', new Carbon($this->date_start)],
            ['date_end', '<=', new Carbon($this->date_end)]
        ])->count();
        return $unavailable;
    }

    public function  getWorkIncapacity()
    {
        $workIncapacity = WorkIncapacity::where([
            ['date_start', '>=', new Carbon($this->date_start)],
            ['date_end', '<=', new Carbon($this->date_end)]
        ])->count();
        return $workIncapacity;
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'resource_plans';
}
