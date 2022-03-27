<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Temoignages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temoignages', function (Blueprint $table) {
            $table->id("ID");
            $table->text("nom")->nullable();
            $table->text("fonction")->nullable();
            $table->text("content")->nullable();
            $table->text("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temoignages');
    }
}
