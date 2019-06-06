<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBusses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busses', function (Blueprint $table) {
            $table->dropPrimary('cart_line_pkey');
            $table->bigIncrements('id')->primary();
            $table->text('conductor')->nullable();
            $table->integer('number_passagers');
            $table->text('type')->nullable();
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
        Schema::dropIfExists('busses');
    }
}
