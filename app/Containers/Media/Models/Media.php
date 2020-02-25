<?php

namespace App\Containers\Media\Models;

use App\Containers\Attachment\Models\Attachment;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Document\Models\Document;
use App\Containers\Invoice\Models\Invoice;
use App\Containers\Job\Models\Job;
use App\Containers\Message\Models\Message;
use App\Containers\Photo\Models\Photo;
use App\Containers\Task\Models\Task;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Parents\Models\Model;
//use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use App\Containers\Expense\Models\Expense;
use Spatie\Tags\HasTags;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{

    use HasTags;

   // protected $cascadeDeletes = ['attachments'];


    protected $fillable = [
        'file',
        'file_name',
        'file_size',
        'mime_type',
        'storage_type'
    ];

    protected $appends = [
        'url',
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

    public function getUrlAttribute()
    {
        return Storage::url($this->file_name);
    }

    public function document()
    {
        return $this->morphedByMany(Document::class, 'attachment');
    }

    public function photo()
    {
        return $this->morphedByMany(Photo::class, 'attachment')->withPivot('type_id');
    }

    public function expense()
    {
        return $this->morphedByMany(Expense::class, 'attachment');
    }

    public function checklist()
    {
        return $this->morphedByMany(Checklist::class, 'attachment')->withPivot('type_id');
    }

    public function project()
    {
        return $this->morphedByMany(Project::class, 'attachment')->withPivot('type_id');
    }

    public function message()
    {
        return $this->morphedByMany(Message::class, 'attachment')->withPivot('type_id');
    }

    public function job()
    {
        return $this->morphedByMany(Job::class, 'attachment')->withPivot('type_id');
    }

    public function discrepancy()
    {
        return $this->morphedByMany(Discrepancy::class, 'attachment')->withPivot('type_id');
    }

    public function task()
    {
        return $this->morphedByMany(Task::class, 'attachment')->withPivot('type_id');
    }

    public function timeRegistry()
    {
        return $this->morphedByMany(TimeRegistry::class, 'attachment')->withPivot('type_id');
    }

    function attachment()
    {
        return $this->hasOne(Attachment::class, 'media_id');
    }

    public function deviation()
    {
        return $this->morphedByMany(Deviation::class, 'attachment')->withPivot('type_id');
    }

    public function invoice()
    {
        return $this->morphToMany(Invoice::class, 'attachment')->withPivot('type_id');
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'media';
}
