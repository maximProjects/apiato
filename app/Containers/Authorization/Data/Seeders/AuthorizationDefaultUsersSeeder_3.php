<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationDefaultUsersSeeder_3
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class  AuthorizationDefaultUsersSeeder_3 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Users (with their roles) ---------------------------------------------
        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'admin@admin.com',
            'admin',
            'Super Admin',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['admin']));


        //Apiato::call('User@CreateUserByCredentialsTask', [
        //    $isClient = false,
        //    'manager@manager.com',
        //    'manager',
        //    'Manager',
        //])->assignRole(Apiato::call('Authorization@FindRoleTask', ['manager']));
        //
        //
        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'employee@employee.com',
            'employee',
            'Employee',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['employee']));


//
        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'employee1@employee.com',
            'employee1',
            'Employee1',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['employee']));


        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'employee2@employee.com',
            'employee2',
            'Employee2',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['employee']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'employee3@employee.com',
            'employee3',
            'Employee3',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['employee']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'employee4@employee.com',
            'employee4',
            'Employee4',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['employee']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = true,
            'client1@client.com',
            'client1',
            'client1',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));
//

        //
        //
        //Apiato::call('User@CreateUserByCredentialsTask', [
        //    $isClient = false,
        //    'client@client.com',
        //    'client',
        //    'Client',
        //])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));
        // ...


        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'info@nordhms.no',
            'uselis',
            'Audrius Uselis',
        ])->assignRole([Apiato::call('Authorization@FindRoleTask', ['admin']), Apiato::call('Authorization@FindRoleTask', ['employee'])]);

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'post@nordhms.no',
            'radzihovsky',
            'Emil Radzihovsky',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['manager']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = false,
            'faktura@nordhms.no',
            'vaitiekute',
            'Gintare Vaitiekute',
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['client']));
    }
}
