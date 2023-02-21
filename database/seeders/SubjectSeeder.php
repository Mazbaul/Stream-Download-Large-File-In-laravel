<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $subjects = [
           'Mathematics',
           'Science',
           'English',
           'History',
           'Geography',
           'Computer Science',
           'Art',
           'Music',
           'Physical Education',
           'Social Studies',
        ];

       foreach ($subjects as $subject) {
           Subject::create(['name' => $subject]);
       }
    }
}
