<?php

namespace App\Containers\Routine\Models;

use App\Ship\Parents\Models\Model;

class RoutineTranslation extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];


}
