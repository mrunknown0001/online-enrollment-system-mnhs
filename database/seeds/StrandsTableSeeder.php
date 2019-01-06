<?php

use Illuminate\Database\Seeder;

class StrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strands')->insert([
        	[
        		'name' => 'Science, Technology, Engineering, and Mathematics',
        		'code' => 'STEM',
        		'track' => 'Academic Track'
        	],
        	[
        		'name' => 'Humanities and Social Sciences',
        		'code' => 'HUMSS',
        		'track' => 'Academic Track'
        	],
        	[
        		'name' => 'Accountancy, Business and Management',
        		'code' => 'ABM',
        		'track' => 'Academic Track'
        	]
        ]);
    }
}
