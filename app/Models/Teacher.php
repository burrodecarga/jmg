<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Sede;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cedula',
        'name',
        'last_name',
        'full_name',
        'email',
    ];


    public function sedes()
    {
        return $this->belongsToMany(Sede::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
