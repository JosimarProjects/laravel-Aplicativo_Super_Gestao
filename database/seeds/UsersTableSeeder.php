<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Josimar de Souza',
            'email' => 'jo030191@gmail.com',
            'password' => 'Josimar.0'
        ]);
    }
}
