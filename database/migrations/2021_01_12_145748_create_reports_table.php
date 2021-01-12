<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['food', 'company']);
            $table->text('body');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('food_id')->nullable();
            $table->foreignId('company_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('company_id')->references('id')->on('foods');
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
        Schema::dropIfExists('reports');
    }
}
