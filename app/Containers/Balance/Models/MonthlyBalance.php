<?php

namespace App\Containers\Balance\Models;

use App\Containers\Job\Models\Job;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class MonthlyBalance extends Model
{
    protected $fillable = [
        "user_id",
        "hours_substr",
        "hours_add",
        "hours_advance",
        "custom_monthly_rate",
        "notice",
        "notice_administrative",
        "monthly_hour_id",
    ];

    protected $appends = [
        ['month_days']
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function monthlyHours()
    {
        return $this->belongsTo(MonthlyHour::class, 'monthly_hour_id');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'monthlybalances';
}
