<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_customer = Role::where('name', 'employee')->first();
        $role_manager = Role::where('name', 'manager')->first();

        $customer = User::create([
            'email' => 'customer@examople.com',
            'name' => 'John Doe',
            'password' => bcrypt('secret')
        ]);
        $customer->roles()->attach($role_customer);


        $admin = User::create([
            'email' => 'fawzanm@gmail.com',
            'name' => 'Mohamed Fawzan',
            'password' => bcrypt('secret')
        ]);
        $admin->roles()->attach($role_manager);


    }
}
