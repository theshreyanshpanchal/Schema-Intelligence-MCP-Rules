<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeManagementSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            EmploymentTypeSeeder::class,
            LeaveTypeSeeder::class,
            DepartmentSeeder::class,
        ]);
    }
}
