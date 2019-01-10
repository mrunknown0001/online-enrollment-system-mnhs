<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// GRADE 7
        DB::table('sections')->insert([
        	[
        		'name' => 'Dalton',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Rutherford',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Sampaguita',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Orchids',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Daisy',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Everlasting',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Gladiola',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Gumamela',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Ilang - Ilang',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Lily',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Lily',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Rosal',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Rose',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Santan',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Sun Flower',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Yellowbell',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Catleya',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Camia',
        		'grade_level' => 7,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        ]);


    	// GRADE 8
        DB::table('sections')->insert([
        	[
        		'name' => 'STE Thompson',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'STE Chadwick',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Maroon',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Aquamarine',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Blue',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Green',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Indigo',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Lavender',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Orange',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Peach',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Purple',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Pink',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Red',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Tangerine',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Violet',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'White',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Yellow',
        		'grade_level' => 8,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        ]);


    	// GRADE 9
        DB::table('sections')->insert([
        	[
        		'name' => 'ROENTGEN',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'BECQUEREL',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'LOVE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'FAITH',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'HOPE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'CHARITY',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'COURAGE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'HONESTY',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'INTEGRITY',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'JOY',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'JUSTICE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'PEACE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'PERCEVERANCE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'PRUDENCE',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'WISDOM',
        		'grade_level' => 9,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        ]);


    	// GRADE 10
        DB::table('sections')->insert([
        	[
        		'name' => 'Einstein',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Newton',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Diamond',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Jade',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Amethyst',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Emerald',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Garnet',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Ivory',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Onyx',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Pearl',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Ruby',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Saphire',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Topaz',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        	[
        		'name' => 'Torquoise',
        		'grade_level' => 10,
        		'school_year' => date('Y') . '-' . date('Y', strtotime("+1 year"))
        	],
        ]);


    }
}
