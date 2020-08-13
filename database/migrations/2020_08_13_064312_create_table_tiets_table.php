<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lop');
            $table->integer('id_bai');
            $table->integer('id_hocphan');
            $table->integer('id_giangvien');
            $table->boolean('buoi');
            $table->date('thoigian');
            $table->integer('sogio');
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
        Schema::dropIfExists('tiets');
    }
}
