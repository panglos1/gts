<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apropos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apropos', function (Blueprint $table) {
            $table->id("ID");
            $table->text("title");
            $table->text("sub_title1");
            $table->text("sub_title2");
            $table->longText("description")->nullable();
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
        Schema::dropIfExists('apropos');
    }
}
