<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->foreign('id_barang')->references('id_barang')->on('barang');

            // $table->unsignedBigInteger('id_pembeli')->nullable();
            // $table->foreign('id_pembeli')->references('id_pembeli')->on('pembeli');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('barang');
            $table->dropForeign(['id_barang']);

            // $table->string('pembeli');
            // $table->dropForeign(['id_pembeli']);
        });
    }
}
