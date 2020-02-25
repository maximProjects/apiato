<?php

namespace App\Containers\Authorization\Models;

use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission
 *
 * @author Mahmoud Zalt  <mahmoud@zalt.me>
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Containers\Authorization\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Authorization\Models\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends SpatiePermission
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
    ];
}
