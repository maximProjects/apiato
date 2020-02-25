<?php

namespace App\Containers\Deviation\Models;

use App\Containers\Checkpoint\Models\Checkpoint;
use App\Containers\Comment\Models\Comment;
use App\Containers\Document\Models\Document;
use App\Containers\Media\Models\Media;
use App\Containers\Photo\Models\Photo;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Deviation extends Model
{
    protected $fillable = [
        "project_id",
        "checkpoint_id",
        "state_id",
        "type_id",
        "date_start",
        "date_end",
        "path",
        "location",
        "suggeseted_actions",
        "user_id",
        "suggested_actions",
        "description",
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkpoint()
    {
        return $this->belongsTo(Checkpoint::class);
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'deviations';
}
