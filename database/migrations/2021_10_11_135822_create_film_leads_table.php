<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_lead', function (Blueprint $table): void {
            $table->id();
            $table->unsignedInteger('film_id');
            $table->unsignedInteger('lead_id');
            $table->timestamps();
            $table->foreign('film_id')->references('id')->on('films')->
            onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->
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
        Schema::dropIfExists('film_lead');
    }
}
