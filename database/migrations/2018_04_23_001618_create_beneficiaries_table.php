<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('user_id')->unsigned()->index();
            $table->string('child_name')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone',15)->nullable();
            $table->integer('gender')->default(0);
            $table->timestamp('dob');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaries');
    }
}
