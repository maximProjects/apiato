<?php

namespace App\Containers\Message\Models;

use App\Containers\Comment\Models\Comment;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Job\Models\JobType;
use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\Project;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Message extends Model
{
    const MESSAGE_USER_TYPE_RECIPIENT = 1;

    const MESSAGE_ATTACHMENT_TYPE_ALL = 1;

    protected $fillable = [
        'project_id',
        'project_group_id',
        'from_id',
        'to_id',
        'to',
        'cc',
        'subject',
        'content',
        'state_id',
        'type_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function toId()
    {
        return $this->belongsTo(User::class, 'to_id');
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'message_users','message_id', 'user_id')->withPivot('type');
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    protected $resourceKey = 'messages';
}
