<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManagePractices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_practices', function (Blueprint $table) {
            $table->integer('id_practice');
            $table->integer('id_teacher');
            $table->integer('id_student');
            $table->integer('id_bus');
            $table->timestamps();

            $table->foreign('id_practice')->references('id')
            ->on('practices')->onDelete('cascade');

            $table->foreign('id_teacher')->references('id')
            ->on('teachers')->onDelete('cascade');

            $table->foreign('id_student')->references('id')
            ->on('students')->onDelete('cascade');
            
            $table->foreign('id_bus')->references('id')
            ->on('busses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_practices');
    }
}
