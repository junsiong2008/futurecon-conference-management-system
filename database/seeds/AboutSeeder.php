<?php

use Illuminate\Database\Seeder;
use App\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = [
            'description' => 'FutureCon aims to provide an outstanding opportunity for both academic and industrial communities alike to address new trends and challenges, emerging technologies and progress in standards on topics relevant to today’s fast-moving areas of Industry 4.0.',
            'date' => date('2020-04-02 08:00:00'),
            'venue' => 'Level 2, Kuala Lumpur Convention Center'
        ];

        About::create($about);
    }
}
