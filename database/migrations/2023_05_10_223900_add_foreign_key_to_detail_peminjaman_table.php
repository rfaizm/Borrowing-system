<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {
            $table->integer('jumlah')->nullable()->after('id_barang');
            //atribut jumlah
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {
            if (Schema::hasColumn('detail_peminjaman', 'jumlah')) {
                $table->dropColumn('jumlah');
            }
        });
    }
};
