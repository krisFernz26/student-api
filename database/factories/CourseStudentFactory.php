<?php

namespace Database\Factories;

use App\Models\CourseStudent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CourseStudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseStudent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'student_id' => \App\Models\Student::all()->random()->id,
        //     'course_id' => \App\Models\Course::all()->random()->id,
        // ];
    }
}
