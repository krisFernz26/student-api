<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'contact_no' => $this->faker->phoneNumber(),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElements(['male', 'female'])[0],
            'civil_status' => $this->faker->randomElements(['married', 'single', 'complicated'])[0],
            'religion' => $this->faker->word(),
            'nationality' => $this->faker->word(),
            'place_of_birth' => $this->faker->city(),
        ];
    }
}
