<?php

namespace App\Containers\Authorization\Models;

use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 *
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $level
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Permission[] $permissions
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends SpatieRole
{

    use HashIdTrait;
    use HasResourceKeyTrait;

    protected $guard_name = 'api';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'level',
    ];
}
