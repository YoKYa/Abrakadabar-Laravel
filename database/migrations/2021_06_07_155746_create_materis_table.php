<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('link_image');
            $table->enum('kesulitan',['Easy', 'Medium', 'Hard']);
            $table->string('sinopsis',254);
            $table->enum('publish',['Draft', 'Published'])->default('Draft');
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
        Schema::dropIfExists('materis');
    }
}
