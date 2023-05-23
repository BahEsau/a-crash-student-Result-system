<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primary = 'id';
    protected $fillable = [
        'name',
        'course_code',
         'description',
         'semester',
         'level_id',
    ];
    //course belongs to many levels
    public function level(){
     return   $this->belongsTo(Level::class);
    }
    //course has many notes
    public function note(){
    return   $this->hasMany(Note::class);
    }
}
