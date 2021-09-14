<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dayofs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('day_of_one')->nullable();
            $table->date('day_of_two')->nullable();
            $table->date('day_of_three')->nullable();
            $table->date('day_of_four')->nullable();
            $table->date('day_of_five')->nullable();

            $table->date('day_of_six')->nullable();
            $table->date('day_of_seven')->nullable();

            $table->date('day_of_from_one')->nullable();
            $table->date('day_of_to_one')->nullable();
            $table->date('day_of_from_two')->nullable();
            $table->date('day_of_to_two')->nullable();
            $table->date('day_of_from_three')->nullable();
            $table->date('day_of_to_three')->nullable();
            $table->date('day_of_from_four')->nullable();
            $table->date('day_of_to_four')->nullable();
            $table->date('day_of_from_five')->nullable();
            $table->date('day_of_to_five')->nullable();

            $table->date('day_of_from_six')->nullable();
            $table->date('day_of_to_six')->nullable();

            $table->date('day_of_from_seven')->nullable();
            $table->date('day_of_to_seven')->nullable();

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
        Schema::dropIfExists('dayofs');
    }
}
