<?php

namespace Database\Seeders;

use App\Models\Teachers;
use App\Models\Departments;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Teachers::factory()
        // ->count(2)
        // ->hasDepartments(1)
        // ->create();
        Teachers::factory()
            ->count(3)
            ->for(Departments::factory()->state([
                'name' => 'Chemistry',
            ]))
            ->create();
    }
}
