<?php

namespace App\Containers\Discrepancy\Models;

use App\Containers\Comment\Models\Comment;
use App\Containers\Manager\Models\Manager;
use App\Containers\Media\Models\Media;
use App\Containers\Message\Models\Message;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class Discrepancy extends Model
{
    protected $fillable = [
        'project_id',
        'project_group_id',
        'state_id',
        'type_id',
        'price_per_hour_extra',
        'price_per_hour',
        'budget_planned',
        'suggested_actions',
        'path',
        'location',
        'date_end',
        'date_start',
        'description',
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

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'discrepancy_user','discrepancy_id', 'user_id')
            ->withPivot('type');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'discrepancies';
}
