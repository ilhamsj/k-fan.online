<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id', 30)->primary();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->bigInteger('paket_id')->unsigned()->index();
            $table->foreign('paket_id')
                    ->references('id')
                    ->on('pakets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('catatan', 100)->nullable();
            $table->string('status', 100)->nullable()->default('pending');
            $table->string('snap_token', 100)->nullable();
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
        Schema::dropIfExists('transaksis');
    }
}
