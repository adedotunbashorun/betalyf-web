<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReveiwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reveiws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 190)->unique();
            $table->integer('hospital_id')->unsigned()->index()->nullable();
            $table->string('subject')->nullable();
            $table->integer('rating')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reveiws');
    }
}
