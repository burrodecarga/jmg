<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Sede;

class Grado extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ordinal',
        'level'
    ];

    public function getFullNameAttribute()
    {
        return "{$this['name']} {$this['level']}";
    }

    public function getFullOrdinalAttribute()
    {
        return "{$this['ordinal']} {$this['level']}";
    }

    public function sedes()
    {
        return $this->belongsToMany(Sede::class)->withPivot('numero','letra')->orderby('grado_id');
    }
}
