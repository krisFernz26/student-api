<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CourseStudent::factory()->count(50)->create();
    }
}
