<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChanalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chanals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('image');
            $table->string('slug');
            $table->string('name');
            $table->string('url');
            $table->timestamps();   

        });


        // Schema::create('chanal_course', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('course_id');
        //     $table->unsignedBigInteger('chanal_id');
        //     $table->timestamps();

        //     $table->unique(['chanal_id' ,'course_id']);
            

            
        //     $table->foreign('chanal_id')->references('id')->on('chanals')->onDelete('cascade');
        //     $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
  
            
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chanals');
    }
}