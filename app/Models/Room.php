<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    const CAPACITY = 0.9;

    protected $fillable = [
        'name',
        'width',
        'sede_id',
        'high',
        'long',
        'capacity',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function max_capacity()
    {
        return  round($this->widt * $this->long * $this->CAPACITY);
    }
}
