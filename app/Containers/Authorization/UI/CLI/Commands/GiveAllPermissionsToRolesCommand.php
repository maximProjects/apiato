<?php

namespace App\Containers\Authorization\UI\CLI\Commands;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authorization\Exceptions\RoleNotFoundException;
use App\Containers\Authorization\Models\Permission;
use App\Ship\Parents\Commands\ConsoleCommand;

/**
 * Class GiveAllPermissionsToRoleCommand
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class GiveAllPermissionsToRolesCommand extends ConsoleCommand
{

    protected $signature = 'apiato:permissions:toRoles';

    protected $description = 'Give all system Permissions to a specific Role.';

    /**
     * @void
     */
    public function handle()
    {

        //$allPermissions = Apiato::call('Authorization@GetAllPermissionsTask', [true]);


        $admin_roles = [
            'search-checklists',
            'create-checklists',
            'list-checklists',
            'delete-checklists',
            'search-checklists',
            'update-checklists',
            'search-checkpoints',
            'list-checkpoints',
            'create-checkpoints',
            'update-checkpoints',
            'delete-checkpoints',
            'search-projects',
            'list-projects',
            'create-projects',
            'update-projects',
            'delete-projects',
            'clone-projects',
            'search-projectgroups',
            'list-projectgroups',
            'create-projectgroups',
            'search-jobs',
            'list-jobs',
            'create-jobs',
            'update-jobs',
            'delete-jobs',
            'search-job-types',
            'list-job-types',
            'create-job-types',
            'update-job-types',
            'delete-job-types',
            'search-tasks',
            'list-tasks',
            'create-tasks',
            'update-tasks',
            'delete-tasks',
            'search-messages',
            'list-messages',
            'create-messages',
            'update-messages',
            'delete-messages',
            'search-timeregistries',
            'list-timeregistries',
            'create-timeregistries',
            'update-timeregistries',
            'delete-timeregistries',
            'search-discrepancities',
            'list-discrepancities',
            'create-discrepancities',
            'update-discrepancities',
            'delete-discrepancities',
            'search-deviations',
            'list-deviations',
            'create-deviations',
            'update-deviations',
            'delete-deviations',
            'search-routine',
            'list-routine',
            'create-routine',
            'update-routine',
            'delete-routine',
            'search-expenses',
            'list-expenses',
            'create-expenses',
            'update-expenses',
            'delete-expenses',
            'search-invoice',
            'list-invoice',
            'create-invoice',
            'update-invoice',
            'delete-invoice',
            'search-work-incapacities',
            'list-work-incapacities',
            'create-work-incapacities',
            'update-work-incapacities',
            'delete-work-incapacities',
            'search-workincapacitytypes',
            'list-workincapacitytypes',
            'create-workincapacitytypes',
            'update-workincapacitytypes',
            'delete-workincapacitytypes',
            'search-users',
            'list-users',
            'update-users',
            'delete-users',
            'refresh-users',
            'search-balance',
            'list-balance',
            'create-balance',
            'create-mounthly-balance',
            'update-balance',
            'update-mounthly-balance',
            'delete-balance',
            'search-media',
            'list-media',
            'create-media',
            'update-media',
            'delete-media',
            'search-dcumments',
            'list-dcumments',
            'create-dcumments',
            'update-dcumments',
            'delete-dcumments',
            'search-comments',
            'list-comments',
            'create-comments',
            'update-comments',
            'delete-comments',
            'search-profiles',
            'list-profiles',
            'create-profiles',
            'update-profiles',
            'delete-profiles',
            'search-timer',
            'list-timer',
            'create-timer',
            'update-timer',
            'delete-timer',
        ];


        $manager_roles =  [
            'search-checklists',
            'create-checklists',
            'list-checklists',
            'delete-checklists',
            'search-checklists',
            'update-checklists',
            'search-checkpoints',
            'list-checkpoints',
            'create-checkpoints',
            'update-checkpoints',
            'delete-checkpoints',
            'search-projects',
            'list-projects',
            'create-projects',
            'update-projects',
            'delete-projects',
            'clone-projects',
            'search-projectgroups',
            'list-projectgroups',
            'create-projectgroups',
            'search-jobs',
            'list-jobs',
            'create-jobs',
            'update-jobs',
            'delete-jobs',
            'search-job-types',
            'list-job-types',
            'create-job-types',
            'update-job-types',
            'delete-job-types',
            'search-tasks',
            'list-tasks',
            'create-tasks',
            'update-tasks',
            'delete-tasks',
            'search-messages',
            'list-messages',
            'create-messages',
            'update-messages',
            'delete-messages',
            'search-timeregistries',
            'list-timeregistries',
            'create-timeregistries',
            'update-timeregistries',
            'delete-timeregistries',
            'search-discrepancities',
            'list-discrepancities',
            'create-discrepancities',
            'update-discrepancities',
            'delete-discrepancities',
            'search-deviations',
            'list-deviations',
            'create-deviations',
            'update-deviations',
            'delete-deviations',
            'search-routine',
            'list-routine',
            'create-routine',
            'update-routine',
            'delete-routine',
            'search-expenses',
            'list-expenses',
            'create-expenses',
            'update-expenses',
            'delete-expenses',
            'search-invoice',
            'list-invoice',
            'create-invoice',
            'update-invoice',
            'delete-invoice',
            'search-work-incapacities',
            'list-work-incapacities',
            'create-work-incapacities',
            'update-work-incapacities',
            'delete-work-incapacities',
            'search-workincapacitytypes',
            'list-workincapacitytypes',
            'create-workincapacitytypes',
            'update-workincapacitytypes',
            'delete-workincapacitytypes',
            'search-users',
            'list-users',
            'update-users',
            'delete-users',
            'refresh-users',
            'search-balance',
            'list-balance',
            'create-balance',
            'create-mounthly-balance',
            'update-balance',
            'update-mounthly-balance',
            'delete-balance',
            'search-media',
            'list-media',
            'create-media',
            'update-media',
            'delete-media',
            'search-dcumments',
            'list-dcumments',
            'create-dcumments',
            'update-dcumments',
            'delete-dcumments',
            'search-comments',
            'list-comments',
            'create-comments',
            'update-comments',
            'delete-comments',
            'search-profiles',
            'list-profiles',
            'create-profiles',
            'update-profiles',
            'delete-profiles',
        ];

        $employee_roles = [
            'search-checklists',
            'create-checklists',
            'list-checklists',
            'delete-checklists',
            'search-checklists',
            'update-checklists',
            'search-checkpoints',
            'list-checkpoints',
            'create-checkpoints',
            'update-checkpoints',
            'delete-checkpoints',
            'search-projects',
            'list-projects',
            'create-projects',
            'update-projects',
            'delete-projects',
            'clone-projects',
            'search-jobs',
            'list-jobs',
            'create-jobs',
            'update-jobs',
            'delete-jobs',
            'search-projectgroups',
            'list-projectgroups',
            'create-projectgroups',
            'search-tasks',
            'list-tasks',
            'create-tasks',
            'update-tasks',
            'delete-tasks',
            'search-messages',
            'list-messages',
            'create-messages',
            'update-messages',
            'delete-messages',
            'search-timeregistries',
            'list-timeregistries',
            'create-timeregistries',
            'update-timeregistries',
            'delete-timeregistries',
            'search-discrepancities',
            'list-discrepancities',
            'create-discrepancities',
            'update-discrepancities',
            'delete-discrepancities',
            'search-deviations',
            'list-deviations',
            'create-deviations',
            'update-deviations',
            'delete-deviations',
            'search-routine',
            'list-routine',
            'create-routine',
            'update-routine',
            'delete-routine',
            'search-expenses',
            'list-expenses',
            'create-expenses',
            'update-expenses',
            'delete-expenses',
            'search-work-incapacities',
            'list-work-incapacities',
            'create-work-incapacities',
            'update-work-incapacities',
            'delete-work-incapacities',
            'search-media',
            'list-media',
            'create-media',
            'update-media',
            'delete-media',
            'search-dcumments',
            'list-dcumments',
            'create-dcumments',
            'update-dcumments',
            'delete-dcumments',
            'list-job-types',
            'create-job-types',
            'update-job-types',
            'delete-job-types',
            'search-comments',
            'list-comments',
            'create-comments',
            'update-comments',
            'delete-comments',
            'search-profiles',
            'list-profiles',
            'create-profiles',
            'update-profiles',
            'delete-profiles',
        ];

        $client_roles = $employee_roles;

        // admin roles

        if (count($admin_roles)>0) {
            $permissions = Permission::whereIn('name', $admin_roles)->where([['guard_name', '=', 'web']])->get();

            if($permissions) {
                $role = Apiato::call('Authorization@FindRoleTask', ['admin']);
                if (!$role) {
                    throw new RoleNotFoundException("Role admin is not found!");
                }

                $role->syncPermissions($permissions->pluck('name')->toArray());

            }
        }

        // manager roles
        if (count($manager_roles)>0) {
            $permissions = Permission::whereIn('name', $manager_roles)->where([['guard_name', '=', 'web']])->get();

            if($permissions) {
                $role = Apiato::call('Authorization@FindRoleTask', ['manager']);
                if (!$role) {
                    throw new RoleNotFoundException("Role manager is not found!");
                }

                $role->syncPermissions($permissions->pluck('name')->toArray());

            }
        }
        // employee roles
        if (count($employee_roles)>0) {
            $permissions = Permission::whereIn('name', $employee_roles)->where([['guard_name', '=', 'web']])->get();

            if($permissions) {
                $role = Apiato::call('Authorization@FindRoleTask', ['employee']);
                if (!$role) {
                    throw new RoleNotFoundException("Role employee is not found!");
                }

                $role->syncPermissions($permissions->pluck('name')->toArray());

            }
        }

        // client roles
        if (count($client_roles)>0) {
            $permissions = Permission::whereIn('name', $client_roles)->where([['guard_name', '=', 'web']])->get();

            if($permissions) {
                $role = Apiato::call('Authorization@FindRoleTask', ['client']);
                if (!$role) {
                    throw new RoleNotFoundException("Role client is not found!");
                }

                $role->syncPermissions($permissions->pluck('name')->toArray());

            }
        }

        echo "Roles created";
    }
}
