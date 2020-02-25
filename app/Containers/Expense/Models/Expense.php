<?php

namespace App\Containers\Expense\Models;

use App\Containers\Comment\Models\Comment;
use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Expense extends Model
{

    use CascadesDeletes;

    protected $cascadeDeletes = ['attachments'];
    protected $fillable = [
        'project_id',
        'project_group_id',
        'user_id',
        'supplier',
        'type_id',
        'document_type_id',
        'number',
        'extra',
        'date',
        'vat',
        'total',
        'total_with_vat',
        'comment',
        'state_id'
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
        return $this->morphToMany(Media::class, 'attachment');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'expenses';
}
