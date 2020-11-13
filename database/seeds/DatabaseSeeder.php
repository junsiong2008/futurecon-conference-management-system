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
        $this->call(UserSeeder::class);
        $this->call(TrackSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(FeeSeeder::class);
        $this->call(AboutSeeder::class);
    }
}
