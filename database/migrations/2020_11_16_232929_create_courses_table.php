<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chanal_id');
            $table->string('slug');
            $table->string('c_name');
            $table->string('url');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();


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
        Schema::dropIfExists('courses');
    }
}