<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
    ];

    public function gender()
    {
     return   $this->belongsTo(Gender::class);
    }

    // a student has many marks/notes
    public function note()
    {
    return    $this->hasMany(Note::class);
    }

    public function user()
    {
     return   $this->belongsTo(User::class);
    }
}
