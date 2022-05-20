<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donhang_id');
            $table->foreign('donhang_id')->references('id')->on('donhang')->onDelete('cascade');
            $table->unsignedBigInteger('sanpham_id');
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
            $table->string('tensanpham');
            $table->integer('soluong');
            $table->bigInteger('dongia');
            $table->bigInteger('tong');
            $table->string('hinhanhsp');
            $table->string('code');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
