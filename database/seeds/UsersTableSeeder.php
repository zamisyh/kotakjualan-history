<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    'name' => 'Zamzam Saputra',
                    'email' => 'zamzam@gmail.com',
                    'password' => bcrypt('zamzam123'),
                    'api_token' => Str::random(40),
                ],
                [
                    'name' => 'Hilda Amalia',
                    'email' => 'hilda@gmail.com',
                    'password' => bcrypt('hilda123'),
                    'api_token' => Str::random(40),
                ]
            ]
        );
    }
}
