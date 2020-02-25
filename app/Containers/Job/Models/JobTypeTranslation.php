<?php

namespace App\Containers\Job\Models;

use App\Ship\Parents\Models\Model;

class JobTypeTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $resourceKey = 'job_types_translations';
    protected $table = 'job_types_translations';
}
