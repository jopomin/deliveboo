<?php

use Illuminate\Database\Seeder;
use App\Typology;
use App\User;

class TypologyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = User::find(1);
            $user->typology->attach([12, 13, 16]);
    }
}
