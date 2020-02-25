<?php

namespace App\Ship\Parents\Models;

use Apiato\Core\Abstracts\Models\Model as AbstractModel;
use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Torzer\Awesome\Landlord\BelongsToTenants;
use Torzer\Awesome\Landlord\Facades\Landlord;
use Torzer\Awesome\Landlord\TenantManager;

/**
 * Class Model.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Model extends AbstractModel
{

    use HashIdTrait;
    use HasResourceKeyTrait;
    use BelongsToTenants;

//    public $tenantColumns = ['tenant_id'];

    public static function boot()
    {
        parent::boot();
       // $user = Auth::user();
        $user = auth('api')->user();

        if ($user) {
            $tenant_id = $user->getTenantId();
            Landlord::addTenant('tenant_id', $tenant_id);
        }

        static::saving(function ($model) {
            $user = Auth::user();
            if ($user) {
                $table_name = $model->getTable();
                if (Schema::hasColumn($table_name, 'created_by')) {
                    $model->created_by = $user->id;
                }
            }
        });
    }

    /**
     * Boot the trait. Will apply any scopes currently set, and
     * register a listener for when new models are created.
     */
//    public static function bootBelongsToTenants()
//    {
//
//        // Grab our singleton from the container
//        static::$landlord = app(TenantManager::class);
//        $user = Auth::user();
//
//        // Add a global scope for each tenant this model should be scoped by.
//        $model = new static();
//        $table_name = $model->getTable();
//
//        if (Schema::hasColumn($table_name, 'tenant_id')) {
//
//            static::$landlord->applyTenantScopes($model);
//
//            // Add tenantColumns automatically when creating models
//            static::creating(function (\Illuminate\Database\Eloquent\Model $model) {
//                static::$landlord->newModel($model);
//            });
//        }
//
//
//    }

}
