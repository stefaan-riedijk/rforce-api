<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','estimated_duration','user_id'
    ];
    public function exercises()
    {
        return $this->belongsToMany(WorkoutExercise::class, 'exercise_session','workout_session_id','workout_exercise_id')->withPivot('num_sets','num_reps');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
