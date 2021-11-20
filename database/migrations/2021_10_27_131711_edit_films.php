<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', static function (Blueprint $table): void {
            $table->renameColumn('trailer_id', 'trailer_url');
            $table->dropForeign(['trailer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', static function (Blueprint $table): void {
            $table->renameColumn('trailer_url', 'trailer_id');
            $table->foreign('trailer_id')->references('id')
                ->on('trailers')->
                onUpdate('cascade')->onDelete('cascade');
        });
    }
}
