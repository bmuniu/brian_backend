<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserRoleSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ProjectSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TravelPlanSeeder::class);
    }
}
