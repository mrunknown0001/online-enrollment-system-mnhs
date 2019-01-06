<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FOR GRADE 7
        DB::table('subjects')->insert([
        	[
        		'title' => 'Mathematics',
        		'code' => 'Math',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'English',
        		'code' => 'Eng',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'Filipino',
        		'code' => 'Fil',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'Edukasyon sa Pagpapakatao',
        		'code' => 'ESP',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'Araling Panlipunan',
        		'code' => 'AP',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'Music, Arts, Physical Education and Health',
        		'code' => 'MAPEH',
        		'grade_level' => 7
        	],
        	[
        		'title' => 'TLE',
        		'code' => 'TLE',
        		'grade_level' => 7
        	]
        ]);


        // FOR GRADE 8
        DB::table('subjects')->insert([
        	[
        		'title' => 'Mathematics',
        		'code' => 'Math',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'English',
        		'code' => 'Eng',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'Filipino',
        		'code' => 'Fil',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'Edukasyon sa Pagpapakatao',
        		'code' => 'ESP',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'Araling Panlipunan',
        		'code' => 'AP',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'Music, Arts, Physical Education and Health',
        		'code' => 'MAPEH',
        		'grade_level' => 8
        	],
        	[
        		'title' => 'TLE',
        		'code' => 'TLE',
        		'grade_level' => 8
        	]
        ]);


        // FOR GRADE 9
        DB::table('subjects')->insert([
        	[
        		'title' => 'Mathematics',
        		'code' => 'Math',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'English',
        		'code' => 'Eng',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'Filipino',
        		'code' => 'Fil',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'Edukasyon sa Pagpapakatao',
        		'code' => 'ESP',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'Araling Panlipunan',
        		'code' => 'AP',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'Music, Arts, Physical Education and Health',
        		'code' => 'MAPEH',
        		'grade_level' => 9
        	],
        	[
        		'title' => 'TLE',
        		'code' => 'TLE',
        		'grade_level' => 9
        	]
        ]);


        // FOR GRADE 10
        DB::table('subjects')->insert([
        	[
        		'title' => 'Mathematics',
        		'code' => 'Math',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'English',
        		'code' => 'Eng',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'Filipino',
        		'code' => 'Fil',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'Edukasyon sa Pagpapakatao',
        		'code' => 'ESP',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'Araling Panlipunan',
        		'code' => 'AP',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'Music, Arts, Physical Education and Health',
        		'code' => 'MAPEH',
        		'grade_level' => 10
        	],
        	[
        		'title' => 'TLE',
        		'code' => 'TLE',
        		'grade_level' => 10
        	]
        ]);
    }
}
