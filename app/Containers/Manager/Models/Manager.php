<?php

namespace App\Containers\Manager\Models;

use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Models\Model;
use App\Containers\User\Models\User;

/**
 * App\Containers\Manager\Models\Manager
 *
 * @property int $id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Project\Models\Project[] $projects
 * @property-read \App\Containers\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Manager\Models\Manager whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Manager\Models\Manager whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Manager\Models\Manager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Manager\Models\Manager whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Manager\Models\Manager whereUserId($value)
 * @mixin \Eloquent
 */
class Manager extends Model
{
    protected $fillable = [
        "user_id",
        "email",
        "password",
        "name",
        "gender",
        "birth"
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


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'managers';
}
