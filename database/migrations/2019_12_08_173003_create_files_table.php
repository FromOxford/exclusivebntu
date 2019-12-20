<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo')->default('profile.png');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('power')->nullable();
            $table->integer('releaseDate')->nullable();
            $table->integer('cost')->nullable();;
            $table->integer('phoneNumber')->nullable();;
            $table->string('descripton')->nullable();;
            $table->integer('booked')->nullable();;
            $table->integer('bookhov')->nullable();;
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
        Schema::dropIfExists('files');
    }
}
