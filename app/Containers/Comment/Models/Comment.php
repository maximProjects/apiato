<?php

namespace App\Containers\Comment\Models;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Job\Models\Job;
use App\Containers\Message\Models\Message;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'content',
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'pivot'
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->morphedByMany(Task::class, 'model_comment');
    }

    public function deviation()
    {
        return $this->morphedByMany(Deviation::class, 'model_comment');
    }

    public function discrepancy()
    {
        return $this->morphedByMany(Discrepancy::class, 'model_comment');
    }

    public function checklist()
    {
        return $this->morphedByMany(Checklist::class, 'model_comment');
    }

    public function job()
    {
        return $this->morphedByMany(Job::class, 'model_comment');
    }

    public function message()
    {
        return $this->morphedByMany(Message::class, 'model_comment');
    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'comments';
}
