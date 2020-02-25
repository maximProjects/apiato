<?php

namespace App\Containers\Project\Models;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\Models\Address;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Document\Models\Document;
use App\Containers\Expense\Models\Expense;
use App\Containers\Manager\Models\Manager;
use App\Containers\Media\Models\Media;
use App\Containers\Photo\Models\Photo;
use App\Containers\ResourcePlan\Models\ResourcePlan;
use App\Containers\Schedule\Models\Schedule;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Tags\HasTags;

/**
 * App\Containers\Project\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property int $client_id
 * @property int $address_id
 * @property \Carbon\Carbon|null $date_start
 * @property \Carbon\Carbon|null $date_end
 * @property \Carbon\Carbon|null $working_hours_from
 * @property \Carbon\Carbon|null $working_hours_to
 * @property string $description
 * @property float $price_per_hour
 * @property float $price_per_hour_extra
 * @property float $working_hours_planned
 * @property float $budget_planned
 * @property int $exclude_from_balance
 * @property int $is_large_scale
 * @property string $color_marker
 * @property string $additional_information
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Manager\Models\Manager[] $managers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Project\Models\ProjectGroup[] $projectGroups
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereBudgetPlanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereColorMarker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereExcludeFromBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereIsLargeScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project wherePricePerHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project wherePricePerHourExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereWorkingHoursFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereWorkingHoursPlanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereWorkingHoursTo($value)
 * @mixin \Eloquent
 * @property int|null $manager_id
 * @property string|null $property_owner_name
 * @property string|null $gnr
 * @property string|null $bnr
 * @property string|null $fnr
 * @property int|null $is_large_scale_project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereBnr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereFnr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereGnr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereIsLargeScaleProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project whereManagerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Project\Models\Project wherePropertyOwnerName($value)
 */
class Project extends Model
{

    use HasStatuses;
    use HasTags;

    protected $fillable = [
        'reference',
        'name',
        'state_id',
        'client_id',
        'manager_id',
        'address_id',
        'building_number',
        'property_number',
        'gnr',
        'bnr',
        'fnr',
        'section',
        'property_owner',
        'property_owner_phone',
        'property_owner_information',
        'property_developer',
        //Work related fields
        'date_start',
        'date_end',
        'working_hours_from',
        'working_hours_to',
        'price_per_hour',
        'price_per_hour_extra',
        'working_hours_planned',
        'budget_planned',
        'exclude_from_balance',
        'has_building_application_form',
        'has_work_safety_plan',
        'is_large_scale_project',
        'color_marker',
        'additional_information',
        'description'
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


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_project','project_id', 'user_id')->withPivot('type');
       // return $this->belongsToMany(User::class, 'user_project', 'project_id', 'user_id');
    }

    public function projectGroups()
    {
        return $this->hasMany(ProjectGroup::class);
    }

    public function timeRegistries()
    {
        return $this->hasMany(TimeRegistry::class);
    }

    public function projectDocuments()
    {
        return $this->hasMany(Document::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'location');
    }

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }

    public function deviations()
    {
        return $this->hasMany(Deviation::class);
    }

    public function expences()
    {
        return $this->hasMany(Expense::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function report()
    {
        $report = Apiato::call('Report@ProjectReportTask', [$this]);
        return $report;
    }

    public function schedules()
    {
        //return $this->morphMany(Schedule::class, 'scheduleable')->withPivot('date_start', 'date_end');
        return $this->morphMany(Schedule::class, 'scheduleable');
    }

    public function resourcePlans()
    {
       return $this->hasMany(ResourcePlan::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'projects';
}
