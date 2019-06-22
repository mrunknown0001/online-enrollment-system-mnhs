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
        		'employee_id' => '0000001',
        		'user_type' => 1, // admin
                'status' => 'Active',
        		'password' => bcrypt('12345678')
        	],[
        		'firstname' => 'Faculty',
        		'lastname' => 'Lastname',
        		'employee_id' => '0000002',
        		'user_type' => 2, // faculty
                'status' => 'Active',
        		'password' => bcrypt('12345678')
        	]
        ]);
    }
}
