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
        $users = config('users');
        foreach($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->vat_number = $user['vat_number'];
            $new_user->address = $user['address'];
            $new_user->reference_name = $user['reference_name'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];
            $new_user->rating = $user['rating'];
            $new_user->image = $user['image'];
            $new_user->save();
        }
    }
}
