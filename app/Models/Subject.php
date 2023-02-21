<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function students(){
      return $this->hasMany(StudentSubject::class, 'id', 'subject_id');
    }
}
