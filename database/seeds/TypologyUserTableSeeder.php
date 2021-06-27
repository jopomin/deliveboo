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
            $user1 = User::find(1);
            $user1->typologies()->sync([10, 12, 14, 17]);
            $user2 = User::find(2);
            $user2->typologies()->sync([9, 11, 16, 17]);
            $user3 = User::find(3);
            $user3->typologies()->sync([6, 8, 13, 17]);
            $user4 = User::find(4);
            $user4->typologies()->sync([7, 10, 12, 13, 16]);
            $user5 = User::find(5);
            $user5->typologies()->sync([9, 14, 16, 17]);
            $user6 = User::find(6);
            $user6->typologies()->sync([5, 9, 16, 17]);
            $user7 = User::find(7);
            $user7->typologies()->sync([1, 4, 5]);
            $user8 = User::find(8);
            $user8->typologies()->sync([2, 3, 15]);
            $user9 = User::find(9);
            $user9->typologies()->sync([14, 16, 17]);
            $user10 = User::find(10);
            $user10->typologies()->sync([1, 6, 7, 8]);
            $user11 = User::find(11);
            $user11->typologies()->sync([2, 3, 11, 14, 17]);
            $user12 = User::find(12);
            $user12->typologies()->sync([9, 10, 14, 16]);

    }
}
