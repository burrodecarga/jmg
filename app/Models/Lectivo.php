<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'year',
        'periodo_id',
        'school_id',
        'sede_id',
        'grado_id',
        'course_id',
        'course_name',
        'teacher_id',
        'teacher_name',
        'ordinal',
        'grado_name',
        'level',
        'numero',
        'letra'
            ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
        // your other new column
    ];

    public function getFullNameAttribute()
    {
        return "{$this['name']} {$this['level']}";
    }

    public function cursos(){
        return $this->hasMany(Course::class,'course_id');
    }
}
