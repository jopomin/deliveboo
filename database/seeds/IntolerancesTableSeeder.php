<?php

use Illuminate\Database\Seeder;
use App\Intolerance;

class IntolerancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intolerances = config('intolerances');
        foreach($intolerances as $intolerance) {
            $new_intolerance = new Intolerance();
            $new_intolerance->name = $intolerance['name'];
            $new_intolerance->icon = $intolerance['icon'];
            $new_intolerance->save();
        }
    }
}
