<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Schedule;
use App\Models\Grado;



class Sede extends Model
{
    use HasFactory;

    const FOTO = '/storage/schools/foto.png';

    protected $fillable = [
        'name',
        'numero',
        'school_id',
        'address',
        'department',
        'municipality',
        'email',
        'phone',
        'cell',
        'sector',
        'logo',
        'image',
    ];

    protected $attributes = [
        'logo' => self::FOTO,
        'image' => self::FOTO,
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function grados()
    {
        return $this->belongsToMany(Grado::class)->withPivot('numero', 'letra')->orderby('grado_id');
    }

    public function coordinadores()
    {
        return $this->belongsToMany(User::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'user_id');
    }


}
