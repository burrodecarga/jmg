<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    const FOTO = '/storage/schools/foto.png';

    protected $fillable = [
        'name',
        'slug',
        'nit',
        'dane',
        'logo',
        'image',
    ];

    protected $attributes = [
        'logo' => self::FOTO,
        'image' => self::FOTO,
    ];

    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }
}
