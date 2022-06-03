<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Nils',
            'email' => 'nils@mail.com',
            'password' => bcrypt('nils')
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => bcrypt('user')
        ]);

        DB::table('users')->insert([
            'name' => 'blocked user',
            'email' => 'blocked@mail.com',
            'password' => bcrypt('blocked'),
            'blocked' => TRUE
        ]); 

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@time2share.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
        ]);
    }
}
