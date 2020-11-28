<?php

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
        $user = \App\User::create([
            'name' => 'Mahmoud',
            'email' => 'user@email.com',
            'password' => bcrypt('secret')
        ]);

        $user->attachRole('user');
    }
}
