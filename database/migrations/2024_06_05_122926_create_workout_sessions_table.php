<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workout_sessions', function (Blueprint $table) {
            $table->id(); // Auto-incrementing integer as primary key
            $table->uuid('uuid')->unique(); // Unique UUID column
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->string('estimated_duration');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->boolean('is_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workout_sessions');
    }
};