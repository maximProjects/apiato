<?php

namespace App\Containers\Job\Models;

use App\Ship\Parents\Models\Model;

class JobTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $resourceKey = 'job_translations';
    protected $table = 'job_translations';
}
