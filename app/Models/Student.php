<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
      'first_name',
      'last_name',
      'age',
      'student_id',
      'department_id'
    ];
    public function departments()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function subjects(){
        return $this->belongsToMany(
           Subject::class,
           'student_subject',
           'student_id',
           'subject_id'
      );
    }

}
