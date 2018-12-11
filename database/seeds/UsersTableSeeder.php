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
        	[
        		'firstname' => 'Admin',
        		'lastname' => 'Lastname',
        		'employee_id' => '201811111',
        		'user_type' => 1, // admin
        		'password' => bcrypt('secret')
        	],[
        		'firstname' => 'Faculty',
        		'lastname' => 'Lastname',
        		'employee_id' => '201822222',
        		'user_type' => 2, // faculty
        		'password' => bcrypt('secret')
        	]
        ]);
    }
}
