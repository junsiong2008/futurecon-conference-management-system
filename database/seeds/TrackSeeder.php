<?php

use Illuminate\Database\Seeder;
use App\Track;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participants = [
            ['track_name' => 'Industry 4.0 and Beyond'],
            ['track_name' => 'Business Informatics and Industry 4.0'],
            ['track_name' => 'Software System and Emerging Technologies'],
            ['track_name' => 'Communication Networks and Industry 4.0']
        ];

        foreach ($participants as $key => $value) {
            Track::create($value);
        }
    }
}
