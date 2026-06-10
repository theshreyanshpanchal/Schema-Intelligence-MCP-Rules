<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'code' => 'annual',
                'name' => 'Annual Leave',
                'description' => 'Paid vacation leave',
                'default_days_per_year' => 20,
                'is_paid' => true,
            ],
            [
                'code' => 'sick',
                'name' => 'Sick Leave',
                'description' => 'Paid leave for illness or medical appointments',
                'default_days_per_year' => 10,
                'is_paid' => true,
            ],
            [
                'code' => 'personal',
                'name' => 'Personal Leave',
                'description' => 'Paid personal or emergency leave',
                'default_days_per_year' => 5,
                'is_paid' => true,
            ],
            [
                'code' => 'unpaid',
                'name' => 'Unpaid Leave',
                'description' => 'Leave without pay',
                'default_days_per_year' => 0,
                'is_paid' => false,
            ],
            [
                'code' => 'maternity',
                'name' => 'Maternity Leave',
                'description' => 'Paid maternity leave',
                'default_days_per_year' => 90,
                'is_paid' => true,
            ],
            [
                'code' => 'paternity',
                'name' => 'Paternity Leave',
                'description' => 'Paid paternity leave',
                'default_days_per_year' => 14,
                'is_paid' => true,
            ],
        ];

        foreach ($types as $type) {
            LeaveType::query()->updateOrCreate(
                ['code' => $type['code']],
                $type,
            );
        }
    }
}
