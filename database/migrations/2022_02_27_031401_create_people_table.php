<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('sex', ['male', 'female'])->nullable();
            $table->string('marital_status')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('general_record')->nullable();
            $table->string('issuing_agency')->nullable();
            $table->char('issuing_agency_fu', 2)->nullable();
            $table->char('cpf', 11)->nullable();
            $table->char('zipcode', 8)->nullable();
            $table->string('public_place')->nullable();
            $table->string('number')->nullable();
            $table->string('city')->nullable();
            $table->char('fu', 2)->nullable();
            $table->char('cellphone', 13)->nullable();
            $table->string('phone', 13)->nullable();
            $table->string('email')->unique();
            $table->boolean('have_transportation')->nullable();
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
        Schema::dropIfExists('peoples');
    }
};
