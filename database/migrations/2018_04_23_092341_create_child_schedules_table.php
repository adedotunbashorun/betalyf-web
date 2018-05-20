<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->unsigned()->index()->nullable();
            $table->integer('beneficiary_id')->unsigned()->index()->nullable();
            $table->text('schedule');
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('children');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_schedules');
    }
}
