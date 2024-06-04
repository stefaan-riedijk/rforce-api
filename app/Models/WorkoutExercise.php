<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'body_part', 'equipment', 'name', 'target'
    ];

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orWhere('target', 'like', "%{$value}%")->orWhere('equipment', 'like', "%{$value}%");
    }
}
