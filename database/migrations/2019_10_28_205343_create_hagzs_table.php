<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHagzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hagzs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('church');
            $table->string('phone_number');
            $table->string('father');
            $table->integer('birth_day');
            $table->integer('birth_month');
            $table->integer('birth_year');
            $table->string('city');
            $table->string('work');
            $table->date('date_of_hagz');
            $table->string('per_number');
            $table->string('note')->nullable();
            $table->string('state');
            $table->integer('hagz_state')->nullable();;
            $table->boolean('show_user')->default(0);
            $table->boolean('show_admin')->default(0);
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
        Schema::dropIfExists('hagzs');
    }
}
