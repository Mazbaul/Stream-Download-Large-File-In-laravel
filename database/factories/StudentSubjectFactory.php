<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentSubject;
use App\Models\Student;
Use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentSubject>
 */
class StudentSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = StudentSubject::class;
    public function definition()
    {
        return [
          'student_id'=>Student::inRandomOrder()->first()->id,
          'subject_id'=>Subject::inRandomOrder()->first()->id,
        ];
    }
}
