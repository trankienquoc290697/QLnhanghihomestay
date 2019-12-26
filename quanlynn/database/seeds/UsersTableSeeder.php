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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => '2',
            'sex' => '1',
            'phone' => '0000000000',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'role' => '1',
            'sex' => '1',
            'phone' => '1111111111',
        ]);
        DB::table('users')->insert([
            'name' => 'chu',
            'email' => 'chu@gmail.com',
            'password' => bcrypt('123456'),
            'role' => '0',
            'sex' => '1',
            'phone' => '2222222222',
        ]);
    }
}
