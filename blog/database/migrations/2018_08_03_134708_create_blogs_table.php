<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

             //nl
     
             $table->string('titleNl')->unique();
             $table->text('bodyNl');

             //eng
           
             $table->string('titleEn')->unique();
             $table->text('bodyEn');
             
             $table->integer('user_id')->nullable();
             $table->integer('photo_id')->nullable();
             $table->integer('category_id')->nullable();

             $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
}
