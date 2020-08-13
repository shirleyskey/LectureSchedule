<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNckhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nckhs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_giangvien');
            $table->string('ten');
            $table->integer('tiendo');
            $table->date('thoigian');
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
        Schema::dropIfExists('nckhs');
    }
}
