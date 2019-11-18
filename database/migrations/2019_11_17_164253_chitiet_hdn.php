<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChitietHdn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethdn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_hdn')->unsigned()->index('hdn_cthdn_foreign');
            $table->integer('id_nguyenlieu')->unsigned()->index('nl_cthdn_foreign');
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
        Schema::dropIfExists('chitiethdn');
    }
}
