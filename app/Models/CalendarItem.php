<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalendarItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','workout_session_id','scheduled_at','title','description'
    ];

    public function workout(): BelongsTo {
        return $this->belongsTo(WorkoutSession::class,'workout_session_id');
    }
}
