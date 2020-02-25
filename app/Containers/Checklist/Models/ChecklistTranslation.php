<?php

namespace App\Containers\Checklist\Models;

use App\Ship\Parents\Models\Model;

class ChecklistTranslation extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];


}
