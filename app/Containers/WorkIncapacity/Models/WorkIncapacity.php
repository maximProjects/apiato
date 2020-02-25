<?php

namespace App\Containers\WorkIncapacity\Models;

use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class WorkIncapacity extends Model
{
    protected $fillable = [
        'user_id',
        'type_id',
        'state_id',
        'date_start',
        'date_end',
        'comment',
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



    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'incapacities';
    protected $table = 'incapacities';
}
