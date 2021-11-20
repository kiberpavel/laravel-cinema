<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('films', static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('year_of_issue');
            $table->string('about');
            $table->integer('rating');
            $table->unsignedInteger('trailer_id');
            $table->integer('min_age');
            $table->unsignedInteger('producer_id');
            $table->timestamps();
            $table->foreign('producer_id')->references('id')
                ->on('producers')->
            onUpdate('cascade')->onDelete('cascade');
            $table->foreign('trailer_id')->references('id')
                ->on('trailers')->
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
        Schema::dropIfExists('films');
    }
}
