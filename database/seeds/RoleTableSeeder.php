<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'customer';
        $role_employee->description = 'A Customer type User';
        $role_employee->save();


        $role_manager = new Role();
        $role_manager->name = 'admin';
        $role_manager->description = 'A Manager User';
        $role_manager->save();


    }
}
