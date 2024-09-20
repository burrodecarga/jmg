<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'year',
        'current'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
        // your other new column
    ];

    public static function lectivo()
{
    return Periodo::where('current',1)->get();
}

}
