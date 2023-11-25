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
        Schema::create('movie', function (Blueprint $table) {
            $table->id('id_movie');
            $table->string('name_movie');
            $table->string('img_movie');
            $table->text('video_movie');
            $table->text('people_movie');
            $table->string('point', 30);
            $table->string('time', 30);
            $table->text('slug_movie')->unique();
            $table->integer('status_movie');
            $table->integer('id_cate');
            $table->integer('id_genre');
            $table->text('tags_movie');
            $table->text('desc_movie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
