<?php

namespace App\Containers\Balance\Models;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Balance extends Model
{
    protected $fillable = [
        "user_id",
        "project_id",
        "project_group_id",
        "time_registry_id",
        "hours",
        "extra_time",
        "sum",
        "balance_date",
        "is_val",
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $appends = [
        "hours_month",
        "hours_worked",
        "hours_dif",
        "hours_prev_month",
        "hours_payed",
        "hours_dif_next_month"
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function TimeRegistry()
    {
        return $this->belongsTo(TimeRegistry::class);
    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'balances';
}
