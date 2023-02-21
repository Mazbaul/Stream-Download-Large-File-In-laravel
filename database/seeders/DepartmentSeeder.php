<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $departments = [
        'Computer Science',
        'Mathematics',
        'Biology',
        'Chemistry',
        'Physics',
        'History',
        'Geography',
        'Literature',
        'Arts',
        'Physical Education',
      ];

      foreach ($departments as $department) {
          Department::create(['name' => $department]);
      }

    }
}
