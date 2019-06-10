<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePractices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->dropPrimary('cart_line_pkey');
            $table->bigIncrements('id')->primary();
            $table->date('date_practice');
            $table->text('place');
            $table->integer('id_teacher');
            $table->integer('id_bus');
            $table->timestamps();

            $table
                ->foreign('id_teacher')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');
            $table
                ->foreign('id_bus')
                ->references('id')
                ->on('busses')
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
        Schema::dropIfExists('practices');
    }
}
