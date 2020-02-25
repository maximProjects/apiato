<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authorization\Models\Permission;
use App\Containers\TimeRegistry\Models\TaskRegistryType;
use App\Containers\User\Models\User;
use App\Ship\Parents\Seeders\Seeder;
use Rennokki\Plans\Models\PlanModel;

class AllDataTestSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'One project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '1',
            'client_id' => '1',
            'address_id' => '1',
            'date_start' => '2019-06-30 00:00:00',
            'date_end' => '2019-08-31 00:00:00',
            'working_hours_from' => '2019-06-30 10:00:00',
            'working_hours_to' => '2019-06-30 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);

        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'Two project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '2',
            'client_id' => '2',
            'address_id' => '1',
            'date_start' => '2019-08-01 00:00:00',
            'date_end' => '2019-08-15 00:00:00',
            'working_hours_from' => '2019-06-30 10:00:00',
            'working_hours_to' => '2019-06-30 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);


        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'www project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '2',
            'client_id' => '1',
            'address_id' => '1',
            'date_start' => '2019-08-5 00:00:00',
            'date_end' => '2019-08-10 00:00:00',
            'working_hours_from' => '2019-06-30 10:00:00',
            'working_hours_to' => '2019-06-30 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);

        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'Three project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '2',
            'client_id' => '2',
            'address_id' => '1',
            'date_start' => '2019-08-01 00:00:00',
            'date_end' => '2019-08-15 00:00:00',
            'working_hours_from' => '2019-07-30 10:00:00',
            'working_hours_to' => '2019-07-30 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);

        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'Three project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '2',
            'client_id' => '2',
            'address_id' => '1',
            'date_start' => '2019-08-01 00:00:00',
            'date_end' => '2019-08-15 00:00:00',
            'working_hours_from' => '2019-09-01 10:00:00',
            'working_hours_to' => '2019-09-01 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);


        Apiato::call('Project@SeedProjectTask', [[
            'name' => 'Three project',
            'description' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'state_id' => '2',
            'client_id' => '2',
            'address_id' => '1',
            'date_start' => '2019-08-01 00:00:00',
            'date_end' => '2019-09-15 00:00:00',
            'working_hours_from' => '2019-09-05 10:00:00',
            'working_hours_to' => '2019-09-05 20:00:00',
            'price_per_hour' => '12.500000',
            'price_per_hour_extra' => '15.000000',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'exclude_from_balance' => '0',
            'is_large_scale_project' => '1',
            'color_marker' => 'red',
            'additional_information' => 'Lorem ipsum descriptio lLorem ipsum descriptio lLorem ipsum descriptio.',
            'reference' => '#123',
            'number_employees_required' => '9'
        ]]);

        Apiato::call('Project@SeedProjectGroupTask', [[
            'name' => 'One project',
            'state_id' => '1',
            'project_id' => '1',
            'reference' => '#123456',
            'date_start' => '2019-06-30 00:00:00',
            'date_end' => '2019-08-31 00:00:00',
            'working_hours_planned' => '250',
            'budget_planned' => '30000.000000',
            'number_employees_required' => '9'
        ]]);


        Apiato::call('Job@SeedJobTypeTask', [['en' => ['name' => 'Painting', 'description' => 'Lorem description'], 'lt' => ['name' => 'Painting LT', 'description' => 'Lorem description LT'], 'planned_hours' => 3 ]]);
        Apiato::call('Job@SeedJobTypeTask', [['en' => ['name' => 'Cleaning', 'description' => 'Lorem description'], 'lt' => ['name' => 'Cleaning LT', 'description' => 'Lorem description LT'], 'planned_hours' => 3 ]]);

        Apiato::call('TimeRegistry@SeedTimeRegistryTask', [[
            'state_id' => '1',
            'user_id' => '1',
            'project_id' => 1,
            'project_group_id' => 1,
            'type_id' => TaskRegistryType::Office,
            'date_start' =>  '2019-07-30 07:15:00',
            'date_end' => '2019-07-30 15:25:00',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
        ]]);
        Apiato::call('TimeRegistry@SeedTimeRegistryTask', [[
            'state_id' => '1',
            'user_id' => '1',
            'project_id' => 1,
            'project_group_id' => 1,
            'type_id' => TaskRegistryType::Office,
            'date_start' =>  '2019-08-01 08:00:00',
            'date_end' => '2019-08-01 19:57:15',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
        ]]);

        Apiato::call('TimeRegistry@SeedTimeRegistryTask', [[
            'state_id' => '1',
            'user_id' => '1',
            'project_id' => 3,
            'project_group_id' => 1,
            'type_id' => TaskRegistryType::Office,
            'date_start' =>  '2019-08-01 08:00:00',
            'date_end' => '2019-08-01 19:57:15',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
        ]]);

        Apiato::call('TimeRegistry@SeedTimeRegistryTask', [[
            'state_id' => '1',
            'user_id' => '1',
            'project_id' => 4,
            'project_group_id' => 1,
            'type_id' => TaskRegistryType::Office,
            'date_start' =>  '2019-08-01 08:00:00',
            'date_end' => '2019-08-01 19:57:15',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
        ]]);

        Apiato::call('TimeRegistry@SeedTimeRegistryTask', [[
            'state_id' => '1',
            'user_id' => '1',
            'project_id' => 5,
            'project_group_id' => 1,
            'type_id' => TaskRegistryType::Office,
            'date_start' =>  '2019-08-01 08:00:00',
            'date_end' => '2019-08-01 19:57:15',
            'extra_time' => '3',
            'description' => 'Lorem lipsum dfkl plvd',
            'latitude_start' => '154.56',
            'latitude_end' => '154.56',
            'longitude_start' => '154.56',
            'longitude_end' => '154.56',
        ]]);

        // Tasks
        Apiato::call('Task@CreateTaskTask', [[
            'state_id' => 1,
            'project_id' => 1,
            'project_group_id' => 1,
            'user_id' => 1,
            'description' => "Test Task",
        ]]);

        Apiato::call('Task@CreateTaskTask', [[
            'state_id' => 2,
            'project_id' => 2,
            'project_group_id' => 1,
            'user_id' => 1,
            'description' => "Test Task 2",
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 1,
            'extra_time' => 5000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description',
            'date_start' => '2019-07-30 07:15:00',
            'date_end' => '2019-07-30 10:15:00',
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 2',
            'date_start' => '2019-07-30 11:15:00',
            'date_end' => '2019-07-30 13:25:00',
        ]]);


        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 3',
            'date_start' => '2019-07-30 11:15:00',
            'date_end' => '2019-07-30 13:25:00',
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 2',
            'date_start' => '2019-07-30 11:15:00',
            'date_end' => '2019-07-30 13:25:00',
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 2',
            'date_start' => '2019-09-05 11:15:00',
            'date_end' => '2019-07-05 13:25:00',
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 2',
            'date_start' => '2019-09-02 11:15:00',
            'date_end' => '2019-09-02 13:25:00',
        ]]);

        Apiato::call('Job@SeedJobTask', [[
            'time_registry_id' => 1,
            'job_type_id' => 2,
            'extra_time' => 7000,
            'fixed_amount' => 200,
            'description' => 'Lorem lipsum job description 2',
            'date_start' => '2019-09-30 11:15:00',
            'date_end' => '2019-09-30 13:25:00',
        ]]);

        Apiato::call('Checklist@SeedChecklistTask', [[
            'lt' => ['name' => 'Checklist name 1', 'description' => 'Checklist Description 1'],
            'en' => ['name' => 'Checklist name 1', 'description' => 'Checklist Description 1'],
            'is_group' => 0,
            'is_template' => 0,
            'parent_id' => null,
        ]]);

        Apiato::call('Checklist@SeedChecklistTask', [[
            'lt' => ['name' => 'Checklist name 2', 'description' => 'Checklist Description 2'],
            'en' => ['name' => 'Checklist name 2', 'description' => 'Checklist Description 2'],
            'is_group' => 0,
            'is_template' => 1,
            'parent_id' => null,
        ]]);

        Apiato::call('Checklist@SeedChecklistTask', [[
            'lt' => ['name' => 'Checklist name 3', 'description' => 'Checklist Description 3'],
            'en' => ['name' => 'Checklist name 3', 'description' => 'Checklist Description 3'],
            'is_group' => 0,
            'is_template' => 0,
            'parent_id' => 1,
        ]]);

        Apiato::call('Checklist@SeedChecklistTask', [[
            'lt' => ['name' => 'Checklist name 4', 'description' => 'Checklist Description 4'],
            'en' => ['name' => 'Checklist name 4', 'description' => 'Checklist Description 4'],
            'is_group' => 0,
            'is_template' => 0,
            'parent_id' => null,
        ]]);


        Apiato::call('Checklist@SeedChecklistTask', [[
            'lt' => ['name' => 'Checklist name 5', 'description' => 'Checklist Description 5'],
            'en' => ['name' => 'Checklist name 5', 'description' => 'Checklist Description 5'],
            'is_group' => 0,
            'is_template' => 0,
            'parent_id' => null,
        ]]);

        Apiato::call('Checkpoint@SeedCheckpointTask', [[
            app()->getLocale() => ['name' => 'Checkpoint name 1', 'description' => 'Checkpoint Description 1'],
            'checklist_id' => 1,
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-01-01",
		    "days" => "22",
		    "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-02-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-03-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-04-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-05-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-06-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-07-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-08-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-09-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-10-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-11-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyHoursTask', [[
            "period" => "2019-12-01",
            "days" => "22",
            "hours" => 150
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "1",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "2",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "3",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "4",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "5",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "6",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "7",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "8",
            "user_id" => 1
        ]]);

        Apiato::call('Balance@CreateMonthlyBalanceTask', [[
            "monthly_hours_id" => "9",
            "user_id" => 1
        ]]);


        Apiato::call('TimeRegistry@ConfirmHoursTask', [1, ['hours' => 21000, "extra_time" => 6989, "sum" => 1900,"balance_date" => "2019-09-04 00:00:00"]]);
        Apiato::call('TimeRegistry@ConfirmHoursTask', [2, ['hours' => 88956, "extra_time" => 3625, "sum" => 1750, "balance_date" => "2019-10-04 00:00:00"]]);
        Apiato::call('TimeRegistry@ConfirmHoursTask', [3, ['hours' => 1596, "extra_time" =>4780, "sum" => 1300, "balance_date" => "2019-09-04 00:00:00"]]);
        Apiato::call('TimeRegistry@ConfirmHoursTask', [4, ['hours' => 17893, "extra_time" => 0, "sum" => 1750, "balance_date" => "2019-10-04 00:00:00"]]);
        Apiato::call('TimeRegistry@ConfirmHoursTask', [5, ['hours' => 17898, "extra_time" => 6897, "sum" => 1300, "balance_date" => "2019-09-04 00:00:00"]]);


        Apiato::call('Schedule@CreateScheduleTask', [[
            "include_snd" => 1,
            "include_strd" => 1,
            "user_id" => 4,
            "project_id" => 1,
            "date_start" => "2019-09-16 10:00:00",
            "date_end" => "2019-12-01 16:00:00",
        ]]);
//
//        Apiato::call('Schedule@CreateScheduleTask', [[
//            "include_snd" => 1,
//            "include_strd" => 1,
//            "user_id" => 1,
//            "project_id" => 1,
//            "date_start" => "2019-10-16 10:00:00",
//            "date_end" => "2019-12-21 16:00:00",
//
//        ]]);
//        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
//            "project_id" => 4,
//            "date_start" => "2014-11-15",
//            "number_employees_required" =>7
//        ]]);
//        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
//            "project_id" => 1,
//            "date_start" => "2019-10-16 10:00:00",
//            "date_end" => "2019-12-21 16:00:00",
//            "number_employees_required" => 3
//        ]]);
//
//        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
//            "project_id" => 2,
//            "date_start" => "2019-10-16 10:00:00",
//            "date_end" => "2019-12-21 16:00:00",
//            "number_employees_required" => 3
//        ]]);
//
//        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
//            "project_id" => 2,
//            "date_start" => "2019-10-16 10:00:00",
//            "date_end" => "2019-12-21 16:00:00",
//            "number_employees_required" => 3
//        ]]);
        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
            "project_id" => 1,
            "date_start" => "2019-11-01",
            "date_end" => "2019-11-29",
            "number_employees_required" => 7
        ]]);

        Apiato::call('ResourcePlan@CreateResourcePlanTask', [[
            "project_id" => 1,
            "date_start" => "2019-11-01",
            "date_end" => "2020-11-29",
            "number_employees_required" => 50
        ]]);

        Apiato::call('Subscription@SubscriptionCreatePlanTask', [[
            "name" => "Admin plan",
            "description" => "Testing plan",
            "price" => 1500,
            "currency" => "EUR",
            "duration" => 360
        ]]);

        Apiato::call('Subscription@SubscriptionCreatePlanTask', [[
            "name" => "Mini",
            "description" => "Project, Schedule, Time Registry",
            "price" => 1500,
            "currency" => "EUR",
            "duration" => 360
        ]]);

        Apiato::call('Subscription@SubscriptionCreatePlanTask', [[
            "name" => "Midi",
            "description" => "Project, Schedule, Checklists",
            "price" => 2500,
            "currency" => "EUR",
            "duration" => 360
        ]]);

        Apiato::call('Subscription@SubscriptionCreatePlanTask', [[
            "name" => "Maxi",
            "description" => "All Permissions",
            "price" => 5000,
            "currency" => "EUR",
            "duration" => 360
        ]]);


        Apiato::call('Subscription@CreateSubscriptionTask', [[
            "user_id" => 1
        ]]);


        Apiato::call('Subscription@CreateSubscriptionTask', [[
            "user_id" => 8
        ]]);


        Apiato::call('Subscription@UpdateSubscriptionTask', [1, [
            "plan_id" => 1
        ]]);


        Apiato::call('Subscription@UpdateSubscriptionTask', [2, [
            "plan_id" => 2
        ]]);


        Apiato::call('Subscription@SubscriptionAttachUsersTask', [[
            "id" => 1,
            "users" => [2,3,4,5,6,7]
        ]]);

        Apiato::call('Subscription@SubscriptionAttachUsersTask', [[
            "id" => 2,
            "users" => [9,10]
        ]]);

    }


}
