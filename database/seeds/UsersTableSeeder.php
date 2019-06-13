<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_customer = Role::where('name', 'customer')->first();
        $role_manager = Role::where('name', 'admin')->first();

        $customer = User::create([
            'id' => '2',
            'email' => 'customer@example.com',
            'name' => 'John Doe',
            'password' => bcrypt('secret')
        ]);
        $customer->roles()->attach($role_customer);


        $admin = User::create([
            'id' => 1,
            'email' => 'fawzanm@gmail.com',
            'name' => 'Mohamed Fawzan',
            'password' => bcrypt('secret')
        ]);
        $admin->roles()->attach($role_manager);


    }
}
