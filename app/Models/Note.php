<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // note belong to a student
    public function student()
    {
      return  $this->belongsTo(Student::class);
    }

    // notes belong to a course
    public function course()
    {
      return  $this->belongsTo(Course::class);
    }
}
