<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get the user role
        $user_role = UserRole::where('role_code', 'USER')->first();

        // create default user
        $user = new User();
        $user->name = 'Brian';
        $user->email = 'bryanmunio@yahoo.com';
        $user->password = bcrypt('pass123');
        $user->user_role_id = $user_role->id;
        $user->save();
    }
}
