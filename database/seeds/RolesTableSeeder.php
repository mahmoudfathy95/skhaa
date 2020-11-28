<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = \App\Role::create([
            'name' => 'owner',
            'display_name' => 'Project Owner',
            'description' => 'can do anything'
        ]);

        $super_admin = \App\Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'can do anything except remove owner & Super Admins'
        ]);

        $user = \App\Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'can do specific tasks'
        ]);

    }
}
