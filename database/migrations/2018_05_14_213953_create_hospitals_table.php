<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 190)->unique();
            $table->integer('hospital_category_id')->unsigned()->index()->nullable();
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('local_id')->unsigned()->index()->nullable();
            $table->float('lat',8,6)->nullable();
            $table->float('lng',8,6)->nullable();
            $table->timestamps();

            $table->foreign('hospital_category_id')->references('id')->on('hospital_categories');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('local_id')->references('local_id')->on('locals');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
