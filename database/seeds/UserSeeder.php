<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Thong',
                'email' => 'thong@futurecon.com',
                'password' => Hash::make('password'),
            ],

            [
                'name' => 'Teng',
                'email' => 'teng@futurecon.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
