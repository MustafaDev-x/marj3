<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });       
        

        Schema::create('course_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['course_id', 'tag_id']);
            
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            
        });

        Schema::create('chanal_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chanal_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->unique(['chanal_id', 'tag_id']);
            
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreign('chanal_id')->references('id')->on('chanals')->onDelete('cascade');
            
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}