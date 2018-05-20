<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 190)->unique();
            $table->integer('hospital_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('marker_image')->nullable();
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
        Schema::dropIfExists('hospital_profiles');
    }
}
