<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Review;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;


    protected $guarded = ['id', 'status'];

    protected $withCount = ['reviews'];

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function lectivos()
    {
        return $this->belongsToMany(Lectivo::class)->withPivot('teacher', 'user_id')->orderby('teacher');
        ;
    }

    public function requeriments()
    {
        return $this->hasMany(Requeriment::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function level()
    {
        return $this->hasOne(Level::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }





}
