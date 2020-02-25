<?php

namespace App\Containers\Checkpoint\Models;

use App\Ship\Parents\Models\Model;

class CheckpointTranslation extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];


}
