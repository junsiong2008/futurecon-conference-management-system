<?php

use Illuminate\Database\Seeder;
use App\Fee;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
            [
                'title' => 'Normal (Non-IEEE Member)',
                'description' => 'Get a ticket as a Non-IEEE Member',
                'price' => 2200.00
            ],
            [
                'title' => 'IEEE Member',
                'description' => 'Get a ticket as an IEEE Member',
                'price' => 2000.00
            ],
            [
                'title' => 'Student',
                'description' => 'Get a ticket as a college student',
                'price' => 1600.00
            ]


        ];

        foreach ($fees as $key => $value) {
            Fee::create($value);
        }
    }
}
