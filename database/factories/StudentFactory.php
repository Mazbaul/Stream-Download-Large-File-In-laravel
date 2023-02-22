<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = Student::class;

    public function definition()
    {
      return [
        'first_name' => $this->faker->firstName,
        'last_name' => $this->faker->lastName,
        'student_id' => $this->faker->unique(true)->numberBetween(100000, 999999),
        'age' => $this->faker->numberBetween(18, 25),
        'department_id' => Department::inRandomOrder()->first()->id,
      ];
    }
}
