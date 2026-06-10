<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'code' => 'EXEC',
                'name' => 'Executive',
                'description' => 'Executive leadership and strategy',
            ],
            [
                'code' => 'HR',
                'name' => 'Human Resources',
                'description' => 'Recruitment, employee relations, and HR operations',
            ],
            [
                'code' => 'ENG',
                'name' => 'Engineering',
                'description' => 'Software development and technical operations',
            ],
            [
                'code' => 'FIN',
                'name' => 'Finance',
                'description' => 'Accounting, payroll, and financial planning',
            ],
            [
                'code' => 'MKT',
                'name' => 'Marketing',
                'description' => 'Brand, communications, and growth',
            ],
            [
                'code' => 'OPS',
                'name' => 'Operations',
                'description' => 'Day-to-day business operations',
            ],
            [
                'code' => 'IT',
                'name' => 'Information Technology',
                'description' => 'Infrastructure, support, and systems administration',
            ],
        ];

        foreach ($departments as $department) {
            Department::query()->updateOrCreate(
                ['code' => $department['code']],
                [
                    'name' => $department['name'],
                    'description' => $department['description'],
                    'is_active' => true,
                ],
            );
        }
    }
}
