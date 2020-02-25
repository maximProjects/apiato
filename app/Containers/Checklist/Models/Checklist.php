<?php

namespace App\Containers\Checklist\Models;

use App\Containers\Checkpoint\Models\Checkpoint;
use App\Containers\Checkpoint\Models\CheckpointState;
use App\Containers\Comment\Models\Comment;
use App\Containers\Confirmation\Models\Confirmation;
use App\Containers\Job\Models\JobType;
use App\Containers\Media\Models\Media;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Models\ProjectGroup;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\ModelStatus\HasStatuses;
use Spatie\QueryBuilder\QueryBuilder;

class Checklist extends Model
{

    use NodeTrait, Translatable, HasStatuses;


    public $translatedAttributes = [
        'name',
        'description'
    ];


    protected $fillable = [
        'project_id',
        'parent_id',
        'project_group_id',
        'state_id',
        'is_group',
        'is_template',
        'contact_user_id',
        'name',
        'description',
        'date_start',
        'date_end',
        'percent',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];


    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];


    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];


//    public function managers()
//    {
//        return $this->belongsToMany(User::class, 'manager_checklist', 'checklist_id', 'manager_id');
//    }

    public function jobTypes()
    {
        return $this->hasOne(JobType::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function media()
    {
        return $this->morphToMany(Media::class, 'attachment')->withPivot('type_id');
    }


    public function user()
    {
        return $this->belongsToMany(User::class, 'user_checklist','checklist_id', 'user_id')->withPivot('type');
    }

    public function tasks()
    {
      return $this->belongsToMany(Task::class, 'task_checklists', 'checklist_id', 'task_id');
    }

    public function projectGroup()
    {
        return $this->belongsTo(ProjectGroup::class);
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'model_comment');
    }


    public function setPercent()
    {
        $percent = 0;
        if($this->is_group == 0) {
            $p = 0;
            if ($this->checkpoints()->get()) {
                $i = 0;
                if($this->checkpoints()->first()) {

                    foreach ($this->checkpoints()->get() as $checkpoint) {


                        if (CheckpointState::Finished == $checkpoint->state_id) {
                            $p = $p + 100;

                        }
                        $i++;
                    }
               }

                if ($p > 0) {
                    $percent = $p / $i;
                }
            }
        } else {
            $childs = $this->children()->get();
            $percent = 0;
            $p = 0;
            $i= 0;
            if($childs) {

                foreach ($childs as $child) {

                    if ($child->percent) {
                        $p = $p + $child->percent;
                    }
                    $i++;
                }
            }

            if($i > 0) {
                $percent = $p / $i;
            }

        }

        $this->percent = $percent;
        $this->save();
        return true;

    }

    public function Confirmations()
    {
      return $this->morphMany(Confirmation::class, 'confirmationable');
    }
//
//    public function setPercent($value) {
//        return 53;
//    }
    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'checklists';
    protected $table = 'checklists';
}
