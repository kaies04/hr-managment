<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            EmployeeSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            PayrollSeeder::class,
        ]);
    }
}

//  sir er 
//   $this->call([
//             PermissionSeeder::class,
//         ]);