<?php

namespace Database\Seeders;

use DB;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i=0; $i < 10; $i++) { 
        //     DB::table('student')->insert([
        //         'sname'      => $i.' - '.Str::random(10),
        //         'semail'     => Str::random(10).'@example.com',
        //         'image'      => 'profile.png',
        //         'phone'      => fake()->numerify('##########'),
        //         'classId'    => 1,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ]);
        // }
        Student::factory()
            ->count(5)
            ->hasRoom(1)
            ->create();
    }
}
