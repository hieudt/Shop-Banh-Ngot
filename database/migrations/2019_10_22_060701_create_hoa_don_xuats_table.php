<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonXuatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_xuats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sdt_kh');
            $table->string('ho_tenkh');
            $table->integer('status');
            $table->string('diachi_ship');
            $table->string('chuthich');
            $table->float('tongtien');
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
        Schema::dropIfExists('hoa_don_xuats');
    }
}
