<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'section_id'
    ];


    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
