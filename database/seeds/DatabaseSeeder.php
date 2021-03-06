<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(StrandsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
    }
}
