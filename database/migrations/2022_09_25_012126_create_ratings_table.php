<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('auditorium_id')->constrained('auditoriums')->cascadeOnDelete();
            $table->unsignedTinyInteger('image_rating')->nullable();
            $table->unsignedTinyInteger('audio_rating')->nullable();
            $table->unsignedTinyInteger('comfort_rating')->nullable();
            $table->unsignedTinyInteger('bomboniere_rating')->nullable();
            $table->unsignedTinyInteger('experience_rating')->nullable();
            $table->text('review')->nullable();
            $table->date('visited_at');
            $table->string('movie_watched');
            $table->string('seat')->nullable();
            $table->string('seat_rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE ratings
            ADD CHECK (image_rating > 0 AND image_rating <= 5),
            ADD CHECK (audio_rating > 0 AND audio_rating <= 5),
            ADD CHECK (comfort_rating > 0 AND comfort_rating <= 5),
            ADD CHECK (bomboniere_rating > 0 AND bomboniere_rating <= 5),
            ADD CHECK (experience_rating > 0 AND experience_rating <= 5),
            ADD CHECK (seat_rating > 0 AND seat_rating <= 5);
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
