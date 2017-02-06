<?php

use Illuminate\Database\Seeder;
use App\UserRole;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // default user roles
        $role = new UserRole();
        $role->role_name = 'User';
        $role->role_code = 'USER';
        $role->save();

        $role = new UserRole();
        $role->role_name = 'Head of Unit';
        $role->role_code = 'HEAD_OF_UNIT';
        $role->save();
    }
}
