<?php

use Illuminate\Database\Seeder;
use App\Typology;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = config('typologies');
        foreach($typologies as $typology) {
            $new_typology = new Typology();
            $new_typology->name = $typology['name'];
            $new_typology->image = $typology['image'];
            $new_typology->save();
        }
    }
}
