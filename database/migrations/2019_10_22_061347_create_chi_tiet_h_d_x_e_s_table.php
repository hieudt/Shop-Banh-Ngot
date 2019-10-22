<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHDXESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_h_d_x_e_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_hdx')->unsigned()->index('hdx_cthdx_foreign');
            $table->integer('id_sanpham')->unsigned()->index('sp_cthdx_foreign');
            $table->integer('soluong');
            $table->float('thanhtien');
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
        Schema::dropIfExists('chi_tiet_h_d_x_e_s');
    }
}
