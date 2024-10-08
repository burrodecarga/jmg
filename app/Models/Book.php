<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =['title','extension','url','category','lesson_id','pages','author'];

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
