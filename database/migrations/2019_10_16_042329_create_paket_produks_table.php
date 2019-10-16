<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paket_id')->unsigned()->index();
            $table->foreign('paket_id')
                    ->references('id')
                    ->on('pakets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->bigInteger('produk_id')->unsigned()->index();
            $table->foreign('produk_id')
                    ->references('id')
                    ->on('produks')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('paket_produks');
    }
}
