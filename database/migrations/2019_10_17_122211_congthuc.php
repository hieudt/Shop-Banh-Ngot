<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Congthuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_thuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_nguyenlieu')->unsigned()->index('congthuc_id_nguyenlieu_foreign');
            $table->integer('id_sanpham')->unsigned()->index('congthuc_id_sanpham_foreign');
            $table->integer('soluong');
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
        Schema::dropIfExists('cong_thuc');
    }
}
