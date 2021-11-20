<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_genre',static function (Blueprint $table): void {
            $table->id();
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('genre_id');
            $table->timestamps();
            $table->foreign('film_id')->references('id')
                ->on('films')->
            onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')
                ->on('genres')->
            onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('film_genre');
    }
}
