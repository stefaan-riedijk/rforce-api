<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exercise_session', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(App\Models\WorkoutExercise::class,'workout_exercise_id');
            $table->foreignIdFor(App\Models\WorkoutSession::class,'workout_session_id');
            $table->integer('num_sets');
            $table->integer('num_reps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_session');
    }
};
