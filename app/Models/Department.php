<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class, 'id', 'department_id');
    }
}
