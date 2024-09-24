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

    public function cursos(){
        return $this->hasMany(Course::class,'course_id');
    }
}
