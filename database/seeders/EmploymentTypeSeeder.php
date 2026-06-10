<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Full-time', 'description' => 'Standard full-time employment'],
            ['name' => 'Part-time', 'description' => 'Reduced hours employment'],
            ['name' => 'Contract', 'description' => 'Fixed-term contract employment'],
            ['name' => 'Intern', 'description' => 'Internship or trainee position'],
            ['name' => 'Freelance', 'description' => 'Project-based freelance engagement'],
        ];

        foreach ($types as $type) {
            EmploymentType::query()->updateOrCreate(
                ['name' => $type['name']],
                ['description' => $type['description']],
            );
        }
    }
}
