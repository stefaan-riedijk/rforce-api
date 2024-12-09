<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    use HasFactory;

    protected $attributes = [
        'is_published' => false,
    ];

    protected $fillable = [
        'id','title','description','estimated_duration','user_id'
    ];
    
    public function exercises()
    {
        return $this->belongsToMany(WorkoutExercise::class, 'exercise_session','workout_session_id','workout_exercise_id')->withPivot('num_sets','num_reps');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Generate ULID
            }
        });
    }
}
