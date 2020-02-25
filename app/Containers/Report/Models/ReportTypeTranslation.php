<?php

namespace App\Containers\Report\Models;

use App\Ship\Parents\Models\Model;

class ReportTypeTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $resourceKey = 'report_types_translations';
    protected $table = 'report_types_translations';
}
