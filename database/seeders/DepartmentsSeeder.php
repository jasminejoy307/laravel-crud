<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('departments')->insert([
        //     'name' =>  Str::random(3)
        // ]);

        Departments::factory()
        ->count(2)
        ->create();
    }
}
