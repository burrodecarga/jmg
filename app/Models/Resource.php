<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'description',
        'quantity',
        'resourceable_id',
        'resourseable_type'
    ];

    public function resourceable()
    {
        return $this->morphTo();
    }
}
