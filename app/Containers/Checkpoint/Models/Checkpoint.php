<?php

namespace App\Containers\Checkpoint\Models;

use App\Containers\Checklist\Models\Checklist;
use App\Ship\Parents\Models\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\ModelStatus\HasStatuses;

/**
 * App\Containers\Checkpoint\Models\Checkpoint
 *
 * @property int $id
 * @property string $name
 */

class Checkpoint extends Model
{

    use Translatable, hasStatuses;


    public $translatedAttributes = [
        'name',
        'description'
    ];

    protected $fillable = [
        'name',
        'description',
        'checklist_id',
        'state_id'
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

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'checkpoints';
}
