<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypologyTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(IntolerancesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(IntoleranceProductTableSeeder::class);
        $this->call(PlacedOrdersTableSeeder::class);
        $this->call(PlacedOrderProductTableSeeder::class);
        $this->call(TypologyUserTableSeeder::class);
    }
}
