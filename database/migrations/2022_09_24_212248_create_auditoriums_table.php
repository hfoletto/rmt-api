<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('auditoriums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('theater_id')->constrained('theaters')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('description', 1000);
            $table->timestamps();
            $table->unique(['slug', 'theater_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoriums');
    }
};
