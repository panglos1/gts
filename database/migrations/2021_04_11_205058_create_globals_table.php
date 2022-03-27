<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id("ID");
            $table->text("title");
            $table->longText("description")->nullable();
            $table->text("image")->nullable();
            $table->timestamps();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->id("ID");
            $table->string("title", 255);
            $table->longText("image")->nullable();
            $table->text("address")->nullable();
            $table->timestamps();
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id("ID");
            $table->string("title", 255);
            $table->string("slug", 255)->unique();
            $table->longText("content")->nullable();
            $table->text("image")->nullable();
            $table->integer("date");
            $table->bigInteger("post_author");
            $table->timestamps();
        });
        Schema::create('requests', function (Blueprint $table) {
            $table->id("ID");
            $table->text("first_name");
            $table->text("last_name");
            $table->text("phone");
            $table->bigInteger("service_id");
            $table->longText("message")->nullable();
            $table->timestamps();
        });
        Schema::create('options', function (Blueprint $table) {
            $table->id("ID");
            $table->text("option_key")->nullable();
            $table->longText("option_value")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('options');
    }
}
