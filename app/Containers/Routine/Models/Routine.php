<?php

namespace App\Containers\Routine\Models;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\ModelStatus\HasStatuses;

class Routine extends Model
{
    use NodeTrait, Translatable, HasStatuses;


    public $translatedAttributes = [
        'name',
        'description'
    ];

    protected $fillable = [
        'project_id',
        'project_group_id',
        'state_id',
        'name',
        'description'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */

    protected $resourceKey = 'routines';
    protected $table = 'routines';
}
