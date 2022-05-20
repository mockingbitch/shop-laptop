<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->unique();
            $table->string('mota');
            $table->text('chitiet');
            $table->bigInteger('gia');
            $table->string('hinhanh');
            $table->string('soluong');
            $table->unsignedBigInteger('danhmuc_id');
            $table->foreign('danhmuc_id')->references('id')->on('danhmuc')->onDelete('cascade');
            $table->unsignedBigInteger('thuonghieu_id');
            $table->foreign('thuonghieu_id')->references('id')->on('thuonghieu')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham');
    }
}
