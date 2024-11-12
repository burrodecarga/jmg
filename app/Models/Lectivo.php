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
        'end'        // your other new column
    ];

    // protected $casts = [
    //     'start' => 'date',
    //     'end' => 'date'
    // ];



    public function getFullCourseNameAttribute()
    {
        return "{$this['course_name']} {$this['level']}";
    }

    public function getFullNameAttribute()
    {
        return "{$this['course_name']} {$this['grado_name']} - seccion: {$this['letra']}";
    }


    public function getFullSedeIdAttribute()
    {
        $sede = Sede::find($this->sede_id);
        return $sede->name;
    }




    public function cursos()
    {
        return $this->hasMany(Course::class, 'course_id');
    }
}
