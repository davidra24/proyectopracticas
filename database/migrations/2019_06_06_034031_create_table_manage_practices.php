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
            $table->integer('id_student');
            $table->timestamps();

            $table
                ->foreign('id_practice')
                ->references('id')
                ->on('practices')
                ->onDelete('cascade');

            $table
                ->foreign('id_student')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
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
