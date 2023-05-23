<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $primaryKey = 'id';
    protected $fillable = ['level'];

    public function student()
    {
      return  $this->hasMany(Student::class);
    }

    public function course()
    {
     return   $this->hasMany(Course::class);
    }
}
