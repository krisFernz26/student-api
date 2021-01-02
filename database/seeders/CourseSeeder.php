<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Course::factory()->count(50)->create()->each(function($course){
            $course->students()->attach(mt_rand(1, 50));
        });
    }
}
