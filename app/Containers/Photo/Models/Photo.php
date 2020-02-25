<?php

namespace App\Containers\Photo\Models;

use App\Containers\Deviation\Models\Deviation;
use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Photo extends Model
{

    use CascadesDeletes;

    protected $cascadeDeletes = ['attachments'];

    const PHOTO_ATTACHMENT_TYPE_ALL = 1;


    protected $fillable = [
        'employee_id',
        'manager_id',
        'project_id',
        'project_group_id',
        'title',
        'description',
        'alt',
        'meta',
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


    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function deviation()
    {
        return $this->belongsTo(Deviation::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'photos';
}
