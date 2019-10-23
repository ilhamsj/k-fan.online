<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaLelayusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('berita_lelayus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('transaksi_id', 30)->index();
            $table->foreign('transaksi_id')
                    ->references('id')
                    ->on('transaksis')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('nama', 100);
            $table->string('alamat', 100);
            $table->string('surat_kematian');
            $table->string('foto');
            $table->dateTime('lahir');
            $table->dateTime('wafat');
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
        Schema::dropIfExists('berita_lelayus');
    }
}
