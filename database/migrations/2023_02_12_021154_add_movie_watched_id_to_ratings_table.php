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
        Schema::table('ratings', function (Blueprint $table) {
            $table->foreignId('movie_watched_id')->after('visited_at')->constrained('movies')->cascadeOnDelete();
            $table->dropColumn('movie_watched');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('movie_watched_id');
            $table->string('movie_watched')->after('visited_at');
        });
    }
};
