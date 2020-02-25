<?php

namespace App\Containers\Project\Models;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Expense\Models\Expense;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use App\Containers\TimeRegistry\Models\TimeRegistry;

/**
 * App\Containers\Project\Models\ProjectGroup
 *
 * @property int $id
 * @property int $state_id
 * @property string $reference
 * @property string $name
 * @property string code
 * @property string $date_start
 * @property string $date_end
 * @property string description
 * @property float $working_hours_planned
 * @property float $budget_planned
 * @property int $number_employees_required
 * @property int $project_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Containers\Project\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereBudgetPlanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereNumberEmployeesRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\ProjectGroup whereWorkingHoursPlanned($value)
 * @mixin \Eloquent
 */
class ProjectGroup extends Model
{
    protected $fillable = [

        'project_id',
        'state_id',
        'reference',
        'code',
        'name',
        'date_start',
        'date_end',
        'working_hours_planned',
        'budget_planned',
        'number_employees_required',
        'description',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function timeRegistries()
    {
        return $this->hasMany(TimeRegistry::class);
    }

    public function report()
    {
        $report = Apiato::call('Report@ProjectGroupReportTask', [$this]);
        return $report;
    }

    public function schedules()
    {
        //return $this->morphMany(Schedule::class, 'scheduleable')->withPivot('date_start', 'date_end');
        return $this->morphMany(Schedule::class, 'scheduleable');
    }


    public function expences()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'project_groups';
}
