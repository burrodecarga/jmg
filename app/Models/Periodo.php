<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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

public function getLapsoAttribute()
{

    return 'desde '.Carbon::parse($this->start)->format('d/m/Y').' hasta '.Carbon::parse($this->end)->format('d/m/Y');
}

}
